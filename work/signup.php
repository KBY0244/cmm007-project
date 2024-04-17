<?php
session_start();

include('connection.php');
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];

    if($password !== $confirmpassword)
    {
       echo "password and confirm password are not same";
    }
       
    else
    {   
        $sql = "INSERT INTO chef (username,email,password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($db, $sql);

        if($result)
        {
            echo "Registered Successfully";
            header("Location: cheflogin.html");
        }
        else
        {
            echo "Something Went Wrong!";
            header("Location: chefsignuphtml.php");
        }
    }
   
?>