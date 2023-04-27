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
                    <img src="<?php 
                    $archivo = '../../examples/userIcons/'.$_SESSION['sessionUser']['id_user'].'/'.$_SESSION['sessionUser']['id_user'].'.png';
                    $default = '../../examples/userIcons/default.png';
                    if(file_exists($archivo)){
                        echo $archivo;
                    }else{
                        echo $default;
                    } ?>" alt="">
                </div>
            </div>
        </div>
    <?php
}


?>