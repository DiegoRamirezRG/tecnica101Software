<?php

if($_POST['function'] == 'downloadAllPlans'){

    $fecha = date('Y-m-d'); 
    $month = date('F', strtotime($fecha));
    $mes = getMesEnEspanol($month);

    $zip = new ZipArchive();
    $filename = "Planeaciones_".$mes.".zip";

    $dir = "./plans";

    if ($zip->open($filename, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
        foreach ($iterator as $file) {
            if ($file->isDir() || in_array($file->getBasename(), array('.', '..'))) {
                continue;
            }

            $relativePath = substr($file, strlen($dir) + 1);
            $zip->addFile($file, $relativePath);

            $zip->close();

            $dest_dir = "./files/";
            if (!file_exists($dest_dir)) {
                mkdir($dest_dir, 0777, true);
            }

            $dest_file = $dest_dir.'/'.$filename;
            if (file_exists($dest_file)) {
                unlink($dest_file);
            }

            if (rename($filename, $dest_file)) {
                echo $filename;
            } else {
                echo "Failed";
            }
        }
    }else{
        exit("cannot open <$filename>\n");
    }
}


function getMesEnEspanol($mesEnIngles) {
    switch(strtolower($mesEnIngles)) {
        case 'january':
            return 'enero';
        case 'february':
            return 'febrero';
        case 'march':
            return 'marzo';
        case 'april':
            return 'abril';
        case 'may':
            return 'mayo';
        case 'june':
            return 'junio';
        case 'july':
            return 'julio';
        case 'august':
            return 'agosto';
        case 'september':
            return 'septiembre';
        case 'october':
            return 'octubre';
        case 'november':
            return 'noviembre';
        case 'december':
            return 'diciembre';
        default:
            return '';
    }
}

?>