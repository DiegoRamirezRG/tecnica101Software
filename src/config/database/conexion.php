<?php
$servername = "192.168.101.13";
$database = "tecnica";
$username = "root";
$password = "Arandas2021";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>