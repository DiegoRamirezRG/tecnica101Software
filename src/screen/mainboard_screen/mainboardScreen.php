<?php

session_start();

if(!isset($_SESSION['sessionUser'])) {
    header("Location: ../login_screen/loginScreen.php");
    exit();
}

$type = $_SESSION['sessionUser']['type'];

switch($type){
    case 'Control':
        //Navigation to Control Escolar Mainboard
        break;
    case 'Coordinador':
        //Navigation to Coordinador Mainboard
        break;
    case 'Perfecto':
        //Navigation to Perfecto Mainboard
        break;
    case 'Maestro':
        //Navigation to Perfecto Mainboard
        break;
    case 'GOD':
        header("Location: ./god_mainboard/godMainboard.php");
        break;
}
?>