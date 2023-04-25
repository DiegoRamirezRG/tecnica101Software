<?php
    
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    if($data['function'] == 'downloadPlanneacion'){

        $fileName = "planeacion_".$data['id_teacher']."_".$data['id_class'].".pdf";
        $dirName = "./plans/".$data['id_teacher'];
        $fullPath = $dirName.'/'.$fileName;

        if(is_dir($dirName) && file_exists($fullPath)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($fullPath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fullPath));
            readfile($fullPath);
        }else{
            echo "El archivo no existe";
        }
    }

    if($data['function'] == 'downloadGuides'){
        $fileName = "guia_".$data['id_teacher']."_".$data['id_class'].".pdf";
        $dirName = "./guides/".$data['id_teacher'];
        $fullPath = $dirName.'/'.$fileName;

        if(is_dir($dirName) && file_exists($fullPath)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($fullPath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fullPath));
            readfile($fullPath);
        }else{
            echo "El archivo no existe";
        }
    }

    if($data['function'] == 'downloadWorks'){
        $fileName = "works_".$data['id_teacher']."_".$data['id_class'].".xlsx";
        $dirName = "./works/".$data['id_teacher'];
        $fullPath = $dirName.'/'.$fileName;
    
        if(is_dir($dirName) && file_exists($fullPath)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename=' . basename($fullPath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fullPath));
            readfile($fullPath);
        }else{
            echo "El archivo no existe";
        }
    }

?>
