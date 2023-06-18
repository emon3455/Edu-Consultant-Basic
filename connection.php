<?php
$username = "root";
$password = "";
$database = "educonsultantdb";

// create connection:
$mysqli = new mysqli("localhost", $username, $password, $database);

// check connection:
if($mysqli->connect_error){
    die("connection field: " . $mysqli->connect_error);
}
// echo "connection successfully  done";
?>