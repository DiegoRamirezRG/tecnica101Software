<?php

function loadHeader(){
    ?>
        <div class="column headerInnerContainer">
            <div class="welcomeMessage">
                <h1>¡Hola Bienvenid@!</h1>
                <h3><?php echo $_SESSION['sessionUser']['type']?> User | <b><?php echo $_SESSION['sessionUser']['name'].' '.$_SESSION['sessionUser']['last_name']?></b></h3>
            </div>
            <div class="actions d-none d-xl-flex">
                <div class="image">
                    <img src="../../examples/userIcons/<?php echo $_SESSION['sessionUser']['id_user']?>/<?php echo $_SESSION['sessionUser']['id_user']?>.png" alt="">
                </div>
            </div>
        </div>
    <?php
}


?>