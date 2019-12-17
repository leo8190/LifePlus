<?php 

//controllers/crearagencia.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../models/Usuarios.php';
require '../views/FormAltaAgencia.php';
require '../views/ListaAgencias.php';
require '../views/AltaAgenciaOk.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');

if(isset($_POST['ok'])) {

	if(!isset($_POST['nombre'])) die("morir al crear");
	
	// (new Agencias)->alta($_POST['nombre'], $_POST['id_supervisor']);
	(new Agencias)->alta($_POST['nombre']);

	$e = new Agencias;
	$todos = $e->getTodas();
	$v = new ListaAgencias;
	$v->agencias = $todos;
	$v->render();
}

else {
	$f = new FormAltaAgencia;
	$usaux= new Usuarios;
	//toma todos los supervisores
	$f->supervisores=$usaux->getByRol("3");
	$f->render();

}

