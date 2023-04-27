<?php
$servername = "localhost";
$database = "tecnica";
$username = "root";
$password = "12345678";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
