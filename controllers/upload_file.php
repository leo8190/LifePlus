<?php

if (!file_exists("../attached_files/prospecto" . $_POST['id_prospecto'] . "/")) {
    mkdir("../attached_files/prospecto" . $_POST['id_prospecto'] . "/", 0777, true);
}

 $targetfolder = "../attached_files/prospecto" . $_POST['id_prospecto'] . "/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

$id = $_POST['id_prospecto'];

//  echo "El archivo ". basename( $_FILES['file']['name']). " fue subido con éxito";
 header('Location: verprospecto.php?num_prosp='.$_POST['id_prospecto']);
//  alert("El archivo ". basename( $_FILES['file']['name']). " fue subido con éxito";):

 }

 else {

 echo "Hubo un problema al subir el archivo";

 }

}

else {

 echo "Solo pueden subirse archivos PDFs, JPEGs o GIF.<br>";

}

?>