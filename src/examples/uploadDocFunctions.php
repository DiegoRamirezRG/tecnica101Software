<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

header("Content-Type: application/json");
$uploadPlanDir = "./plans/".$_SESSION['sessionUser']['id_user']."/";
$uploadGuideDir = "./guides/".$_SESSION['sessionUser']['id_user']."/";
$uploadWorkDir = "./works/".$_SESSION['sessionUser']['id_user']."/";

if($_POST['function'] == 'Planeations'){

    if(!is_dir($uploadPlanDir)){ 
        @mkdir($uploadPlanDir, 0700); 
    }

    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {

        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = basename($_FILES["file"]["name"]);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $newName = "planeacion_".$_SESSION['sessionUser']['id_user']."_".$_POST['classId'].".".$ext;
        $target_path = $uploadPlanDir . $newName;
        move_uploaded_file($tmp_name, $target_path);

        echo json_encode(array("status" => "success"));
    }else{
        echo json_encode(array("status" => "false"));
    }
}

if($_POST['function'] == 'Guides'){

    if(!is_dir($uploadGuideDir)){ 
        @mkdir($uploadGuideDir, 0700); 
    }

    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {

        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = basename($_FILES["file"]["name"]);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $newName = "guia_".$_SESSION['sessionUser']['id_user']."_".$_POST['classId'].".".$ext;
        $target_path = $uploadGuideDir . $newName;
        move_uploaded_file($tmp_name, $target_path);

        echo json_encode(array("status" => "success"));
    }else{
        echo json_encode(array("status" => "false"));
    }
}

if($_POST['function'] == 'Works'){

    if(!is_dir($uploadWorkDir)){ 
        @mkdir($uploadWorkDir, 0700); 
    }

    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {

        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = basename($_FILES["file"]["name"]);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $newName = "works_".$_SESSION['sessionUser']['id_user']."_".$_POST['classId'].".".$ext;
        $target_path = $uploadWorkDir . $newName;
        move_uploaded_file($tmp_name, $target_path);

        echo json_encode(array("status" => "success"));
    }else{
        echo json_encode(array("status" => "false"));
    }
}

?>