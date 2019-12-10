// <?php 

//controllers/veragencias.php

require '../fw/fw.php';
require '../models/Localidades.php';
require '../views/ListaLocalidades.php';


if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');


if(isset($_POST['ok'])){

	(new Localidades)->editarLocalidad($_POST['id_loc'],$_POST['id_ag']);
	echo "MODIFICACION OK";

}



$e = new Localidades;
$todos = $e->getTodas();
$v = new ListaLocalidades;
$v->localidades = $todos;
$v->render();