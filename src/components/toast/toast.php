<?php

    function showToast($id, $title, $body){
        echo '<div class="toast-container position-fixed top-0 mx-auto p-3">';
        echo '<div id="'.$id.'" class="toast" role="alert" aria-live="assertive" aria-atomic="true">';
        echo '<div class="toast-header bg-danger">';
        echo '<strong class="me-auto text-white">'.$title.'</strong>';
        echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>';
        echo '</div>';
        echo '<div class="toast-body" style="opacity: 1 !important;">';
        echo $body;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

?>