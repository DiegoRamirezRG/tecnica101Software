<?php
include_once('../../components/header/header.php');
include_once('../../components/card/card.php');
?>

<div class="container">
    <div class="headerContainer">
        <?php loadHeader();?>
    </div>
    <div class="cards">
        <?php for ($i=0; $i < 6; $i++) { 
            createCard();
        }?>
    </div>
</div>