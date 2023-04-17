<?php
require_once '../../config/userOpts/userOpts.php';
include_once('../../components/header/header.php');
include_once('../../components/card/card.php');

session_start();

$currentOptions = array();
$type = $_SESSION['sessionUser']['type'];

?>

<div class="container">
    <div class="headerContainer">
        <?php loadHeader();?>
    </div>
    <div class="cards">
        <?php 

        switch($type){
            case 'Control':
                $currentOptions = $controlSidebarOpts;
                break;
            case 'Coordinador':
                $currentOptions = $coordinadorSidebarOpts;
                break;
            case 'Prefecto':
                $currentOptions = $prefectoSidebarOpts;
                break;
            case 'Maestro':
                $currentOptions = $teacherSidebarOpts;
                break;
            case 'GOD':
                $currentOptions = $godSidebarOpts;
                break;
        }
        
        for ($i=0; $i < count($currentOptions); $i++) { 
            createCard($currentOptions[$i]);
        }?>
    </div>
</div>