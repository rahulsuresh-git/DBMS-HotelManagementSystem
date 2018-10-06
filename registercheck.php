<?php
session_start();
error_reporting(0);
include('db.php');

           $name = mysqli_real_escape_string($conn, $_POST["name"]);  
           $email = mysqli_real_escape_string($conn, $_POST["email"]);  
           $address = mysqli_real_escape_string($conn, $_POST["address"]);  
           $age = mysqli_real_escape_string($conn, $_POST["age"]);  
           $contact = mysqli_real_escape_string($conn, $_POST["contact"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $gender = mysqli_real_escape_string($conn, $_POST["gender"]);  
           $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);  

           $password = sha1($password);  
$uid=rand(1,100);


           $query = "INSERT INTO guest values ('$uid','$name','$address','$email','$contact','$age','$gender','$nationality')";  
           $result = mysqli_query($conn, $query);  
           if($result)  
           {  
            $query = "INSERT INTO auth values ('$uid','$email','$password')";  
            $result = mysqli_query($conn, $query);  
                echo 'done';
           }  
           else  
           {  
                echo 'wrong';  
           }  
        
 
?>