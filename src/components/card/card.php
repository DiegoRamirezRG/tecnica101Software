<?php

function createCard($props){
    ?>
    <div class="card" id="<?php echo $props['id'].'CardComponent'?>">
        <img class="card-img-top cardImg" src="https://picsum.photos/286/180" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">
                <div class="center text-center">
                    <h4>Ir a <?php echo $props['title']?></h4>
                </div>
            </h5>
        </div>
    </div>
    <?php
}

?>