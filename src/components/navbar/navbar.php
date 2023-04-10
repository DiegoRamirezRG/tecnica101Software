<?php

function renderSideOpt($props){
    ?>
    <li class="">
        <a href="#">
            <i class='bx <?php echo $props['icon']?> icon' ></i>
            <span class="text nav-text"><?php echo $props['title']?></span>
        </a>
    </li>
    <?php
}

function renderNavBar($opts){
    ?>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../assets/img/tecnicaMainLogo.svg" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">Esc. Secundaria</span>
                    <span class="profession">Tecnica 101</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <?php
                
                foreach($opts as $props){
                    renderSideOpt($props);
                }

                ?>
            </div>
            <div class="bottom-content">
                <li class="" id="logout">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <?php
}

?>