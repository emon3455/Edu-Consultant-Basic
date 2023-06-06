<?php
 session_start();
 include_once('connection.php');

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or any other desired page
header("Location: home.php");
?>