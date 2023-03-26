<?php

require_once('../../model/login_model/loginModel.php');
require_once('../../config/database/conexion.php');

if($_POST['function'] == 'LOGIN'){
    try {
        $login = new loginModel($conn);
        $result = $login->login($_POST['email'], $_POST['password']);
        if($result){
            echo "Logged";
        }else{
            echo "Failed";
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}

?>