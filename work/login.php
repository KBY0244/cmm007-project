<?php
session_start(); 

include("connection.php"); 
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        echo "Both fields are required.";
    }
    else
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT email FROM chef WHERE email='$email' and password='$password'";
        $result=mysqli_query($db,$sql);

         if(mysqli_num_rows($result) == 1)
        {
            header("location: chefdashboard.php"); 
        }
        else
        {
            echo "Incorrect username or password.";
            
        }
    }
?>