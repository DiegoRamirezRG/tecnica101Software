<?php

session_start();
require_once('../../config/database/conexion.php');

if($_POST['function'] == 'updateProfileData'){
    try {

        $query = "UPDATE user_table SET name = '".$_POST['name']."', last_name = '".$_POST['last_name']."', mothersLast_name = '".$_POST['mothersLast_name']."', phone = ".$_POST['phone']." WHERE id_user = ".$_SESSION['sessionUser']['id_user']."";

        $result = $conn->query($query);

        if(mysqli_affected_rows($conn) > 0){

            $_SESSION['sessionUser']['name'] = $_POST['name'];
            $_SESSION['sessionUser']['last_name'] = $_POST['last_name'];
            $_SESSION['sessionUser']['mothersLast_name'] = $_POST['mothersLast_name'];
            $_SESSION['sessionUser']['phone'] = $_POST['phone'];

            echo "Success";
        }else{
            echo "Failed";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'updatePassword'){
    try {

        $query = "SELECT password FROM user_table WHERE id_user = ".$_SESSION['sessionUser']['id_user']."";
        $result = $conn->query($query);
        
        if($result -> num_rows > 0){

            foreach ($result as $data)

            if(isPasswordMatch($_POST['currentPassword'], $data['password'])){
                $hashedNewPassword = md5($_POST['newPassword']);
                $updatePasswordQuery = "UPDATE user_table SET password = '".$hashedNewPassword."' WHERE id_user = ".$_SESSION['sessionUser']['id_user']."";
                $resultUpdate = $conn->query($updatePasswordQuery);

                if(mysqli_affected_rows($conn) > 0){
                    echo 'Success';
                }else{
                    echo 'Failed';
                }
            }else{
                echo 'La contraseña no coincide con la contraseña actual';
            }
        }else{
            echo 'Error al obtener contraseña del usuario';
        }


    } catch (\Throwable $th) {
        echo $th;
    }
}

function isPasswordMatch($currentPassword, $hashBd){
    $hashedCurrent = md5($currentPassword);
    if($hashedCurrent == $hashBd){
        return true;
    }else{
        return false;
    }
}

if($_POST['function'] == 'loadImage'){
    try {

        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);
        $pathName = '../../examples/userIcons/'.$_SESSION['sessionUser']['id_user'].'/'; 
        $image_name = $pathName.$_SESSION['sessionUser']['id_user'].'.png';

        if (!is_dir($pathName)) {
            mkdir($pathName);
        }else{

        }

        file_put_contents($image_name, $data);
        echo $image_name;

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>