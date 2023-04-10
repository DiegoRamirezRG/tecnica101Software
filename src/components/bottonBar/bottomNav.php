<?php

function renderOpt($props){
    ?>
    <li class="bottom-item">
        <label for="<?php echo $props['id']?>" class="bottom-option">
            <input type="radio" id="<?php echo $props['id']?>" name="bottomNavOpt">
            <i class='bx <?php echo $props['icon']?> icon' id="<?php echo $props['id']?>Icon" ></i>
        </label>
        <div class="indicator" id="<?php echo $props['id']?>Indicator"></div>
    </li>
    <?php
}

function renderBottomBar($opts){
    ?>
    <section class="bottomNav">
        <div class="bottom-nav">
            <ul class="bottom-list">
                <?php
                
                foreach ($opts as $prop ) {
                    renderOpt($prop);
                }   
                ?>
            </ul>
        </div>
    </section>
    <?php
}

?>