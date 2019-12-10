<?php

// controllers/cambiarestado.php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/EditarEstado.php';
require '../views/ListaProspectos.php';
require '../views/AgregarSeguimiento.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');



if (isset($_POST['cambiar_estado'])) {
	$f= new EditarEstado;
	$e= new Estados;
	$estados_disponibles= $e->getCambiosPosibles($_POST['est_act']);
	if($estados_disponibles==false)	$f->est_disp=false;
	else $f->est_disp=$estados_disponibles;
	
	$f->id_prospecto=$_POST['id_pr'];
	$f->est_act=$_POST['est_act'];
	$f->nom_est_act=$_POST['nom_est'];
	$f->render();
}

if (isset($_POST['modif_est'])){
	if (!isset($_POST['id_prospecto'])) die("no se envio un id prosp");
	if (!isset($_POST['id_estado_act'])) die("no se envio un id prosp");
	if (!isset($_POST['id_estado_nuevo'])) die("no se envio un id prosp");
	if (!isset($_POST['comentarios'])) die("no se envio un id prosp");

	(new Seguimiento)->setSeguimiento($_POST['comentarios'], $_POST['id_prospecto'],
		$_SESSION['id_usuario']);

	(new Prospectos)->cambiarEstado($_POST['id_prospecto'],$_POST['id_estado_act'],
	$_POST['id_estado_nuevo']);

	(new Movimiento)->setMovimiento($_POST['id_prospecto'],
		$_POST['id_estado_nuevo'],$_SESSION['id_usuario']);

$e = new Prospectos;
//aca irian las variables de sesión
$todos = $e->getByUser($_SESSION['id_usuario'], $_SESSION['id_rol'], $_SESSION['id_agencia']);
//$id_usuario, $id_rol, $id_agencia
$v = new ListaProspectos;
$v->prospectos = $todos;
$v->render();
}

if(isset($_POST['agregar_comentario'])){
	if (!isset($_POST['id_pr'])) die("no se envio un id prosp");
	
	$f=new AgregarSeguimiento;
	$f->id_prospecto=$_POST['id_pr'];
	$f->nom_est_act=$_POST['nom_est'];
	$f->id_usuario=$_SESSION['id_usuario'];
	$f->render();
}



