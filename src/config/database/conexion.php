<?php
$servername = "10.130.206.23";
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