<?php
session_start();
include('db.php');

if (isset($_SESSION['username'])){
      $email=$_SESSION['username'];
           $checkin = mysqli_real_escape_string($conn, $_POST["checkin"]);  
           $checkout = mysqli_real_escape_string($conn, $_POST["checkout"]);  
           $roomtype = mysqli_real_escape_string($conn, $_POST["roomtype"]);  
           $rooms = mysqli_real_escape_string($conn, $_POST["rooms"]);  
           $adult = mysqli_real_escape_string($conn, $_POST["adult"]);  
           $child = mysqli_real_escape_string($conn, $_POST["child"]);  
           $query = "SELECT uid  FROM auth WHERE email = '$email'";  
           $uid = mysqli_query($conn, $query);  
$row=mysqli_fetch_array($uid);
$uid= $row['uid'];     
$query = "REPLACE INTO registration values ('$uid','$checkin','$checkout','$roomtype','$rooms','$adult','$child','PENDING')";  

        if( mysqli_query($conn, $query))
        echo "done";
        else
        echo "wrong";


}
else {

      header('Location: index.php');
	die();
}

 
?>