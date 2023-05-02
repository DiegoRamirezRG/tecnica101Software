<?php
$servername = "162.241.60.250";
$database = "tecnican_escdatabase";
$username = "tecnican_user";
$password = 'Gn]POs(3D$hM';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
