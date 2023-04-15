<?php

    function showToast($id, $title, $body){
        echo '<div class="toast-container position-absolute top-0 end-0 mx-auto p-3" style="z-index: 999;">';
        echo '<div id="'.$id.'" class="toast" role="alert" aria-live="assertive" aria-atomic="true">';
        echo '<div class="toast-header bg-danger">';
        echo '<strong class="me-auto text-white">'.$title.'</strong>';
        echo '</div>';
        echo '<div class="toast-body" style="opacity: 1 !important;">';
        echo $body;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    function showSucessToast($id, $title, $body){
        echo '<div class="toast-container position-absolute top-0 end-0 mx-auto p-3" style="z-index: 999;">';
        echo '<div id="'.$id.'" class="toast" role="alert" aria-live="assertive" aria-atomic="true">';
        echo '<div class="toast-header bg-success">';
        echo '<strong class="me-auto text-white">'.$title.'</strong>';
        echo '</div>';
        echo '<div class="toast-body" style="opacity: 1 !important;">';
        echo $body;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

?>