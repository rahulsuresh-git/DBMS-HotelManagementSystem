<?php
session_start();
include('db.php');

if (isset($_SESSION['username'])){
      $email=$_SESSION['username'];
          
           $query = "update registration r inner join guest s on
               r.uid = s.uid
           set r.status ='CONFIRMED'";  

        if( mysqli_query($conn, $query))
        {echo "done";}
        else echo "wrong";
}

else {

      header('Location: index.php');
	die();
}

 
?>