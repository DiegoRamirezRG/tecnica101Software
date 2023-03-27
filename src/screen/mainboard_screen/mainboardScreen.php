<?php

session_start();

if(!isset($_SESSION['sessionUser'])) {
    header("Location: ../login_screen/loginScreen.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainboard</title>
</head>
<body>
    <?php
    var_dump($_SESSION['sessionUser']);
    ?>
</body>
</html>