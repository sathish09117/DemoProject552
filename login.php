<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        require_once 'connect.php';

        $sql = "SELECT * FROM users_table WHERE email = '$email'";

        $response = mysqli_query($conn,$sql);
        $result = array();
        $result['login'] = array();

        if(mysqli_num_rows($response) === 1)
        {
            $row = mysqli_fetch_assoc($response);
            if(password_verify($password,$row['password']))
            {
                $index['name'] = $['name'];
                $index['email'] = $['email'];

                array_push($result['login'],$index);
                $result['success'] = '1';
                $result['message'] = "success";

                mysqli_close($conn);
            }
            else
            {
                $result['success'] = '0';
                $result['message'] = "error";
                
                mysqli_close($conn);
            }
        }
        $result['success'] = '0';
        $result['message'] = "error";
        
        mysqli_close($conn);


    }
    $result['success'] = '0';
    $result['message'] = "error";
    
    mysqli_close($conn);

?>