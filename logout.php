<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION);
$_SESSION = array();

header('Location: index.php');
die();
?>