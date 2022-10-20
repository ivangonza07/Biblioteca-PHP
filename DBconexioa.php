<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "inbentarioadb-ivan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>