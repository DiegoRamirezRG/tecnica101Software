<?php

function loadHeader(){
    ?>
        <div class="column headerInnerContainer">
            <div class="welcomeMessage">
                <h1>¡Hola Bienvenid@!</h1>
                <h3><?php echo $_SESSION['sessionUser']['type']?> User | <b>Douglas Adil Ramirez Reyes</b></h3>
            </div>
            <div class="actions d-none d-xl-flex">
                <div class="image">
                    <img src="https://i.pinimg.com/736x/59/37/5f/59375f2046d3b594d59039e8ffbf485a.jpg" alt="">
                </div>
            </div>
        </div>
    <?php
}


?>