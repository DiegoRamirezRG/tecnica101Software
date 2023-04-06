<?php

session_start();

if(!isset($_SESSION['sessionUser'])) {
    header("Location: ../login_screen/loginScreen.php");
    exit();
}

$type = $_SESSION['sessionUser']['type'];

switch($type){
    case 'Control':
        //Navigation to Control Mainboard
        header("Location: ./principal_mainboard/principalMainboard.php");
        break;
    case 'Coordinador':
        //Navigation to Coordinador Mainboard
        header("Location: ./coordinador_mainboard/coordinadorMainboard.php");
        break;
    case 'Prefecto':
        //Navigation to Perfecto Mainboard
        header("Location: ./prefect_mainboard/prefectMainboard.php");
        break;
    case 'Maestro':
        //Navigation to Perfecto Mainboard
        header("Location: ./teacher_mainboard/teacherMainboard.php");
        break;
    case 'GOD':
        header("Location: ./god_mainboard/godMainboard.php");
        break;
}
?>