<?php 

//controllers/veragencias.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../views/ListaAgencias.php';


if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');


if(isset($_POST['ok'])){

	//var_dump($_POST['id_agencia']);
	(new Agencias)->editarAgencia($_POST['id_agencia'],$_POST['nombre_ag']);
	echo "MODIFICACION OK";

}



$e = new Agencias;
$todos = $e->getTodas();
$v = new ListaAgencias;
$v->agencias = $todos;
$v->render();
