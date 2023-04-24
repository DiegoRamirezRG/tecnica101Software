<?php

function createCard($props){
    ?>
    <div class="card homeCardClass" id="<?php echo $props['id'].'CardComponent'?>">
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


function createClassCard($props){
    ?>
    <div class="card classCard d-flex flex-row justify-content-center align-items-center" id="<?php echo $props['id_class_teacher']?>">
        <div class="iconClassContainer col-3">
            <i class='bx bx-book bx-lg'></i>
        </div>
        <div class="infoClassContainer col ml-2">
            <div class="className">
                <p><?php echo $props['class_name']?></p>
            </div>
            <div class="classInfoContainer">
                <?php echo $props['shift_name'].' | '.$props['grade_name'].' | '.$props['group_name']?>
            </div>
        </div>
    </div>
    <?php
}
?>