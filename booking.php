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
$query = "SELECT *  FROM room WHERE type = '$roomtype'";  
$result = mysqli_query($conn, $query);  
$row=mysqli_fetch_array($result);


$diff = abs(strtotime($checkout) - strtotime($checkin));
$years   = floor($diff / (365*60*60*24)); 
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$nights    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$adultpernight=$row['adult'];
$adultcost=$adult * $adultpernight;
$childpernight=$row['child'];
$childcost=$child * $childpernight;
$totalcost= $nights*($adultcost+$childcost);



$query = "REPLACE INTO registration values ('$uid','$checkin','$checkout','$roomtype','$rooms','$adult','$child','PENDING')";  

        if( mysqli_query($conn, $query))
        {
        $bookid="GP".rand(100000,999999);
        date_default_timezone_set('Asia/Kolkata');
        date_default_timezone_set('Asia/Kolkata'); 
        $tp= date("Y-m-d H:i:s"); 

        $query = "REPLACE INTO booking values ('$uid','$bookid','$totalcost','$tp')";  
        if( mysqli_query($conn, $query)){
              echo "done";
        }
        else
        {echo "wrong";}
      
      }
        else
        echo "wrong";


}
else {

      header('Location: index.php');
	die();
}

 
?>