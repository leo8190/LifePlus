<?php

$file = basename($_GET['file']);
// $file = '../attached_files/'.$file;

$file = "../attached_files/prospecto" . $_GET['id_prospecto'] . "/" . $file;

if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}

?>