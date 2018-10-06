<?php
session_start();
error_reporting(0);
include('db.php');

      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo 'wrong';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, $_POST["username"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $password = sha1($password);  
           $query = "SELECT * FROM auth WHERE email = '$username' AND pass = '$password'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                $_SESSION['id'] = $result['uid'];
            

                echo 'done';
           }  
           else  
           {  
                echo 'wrong';  
           }  
      }  
 
?>