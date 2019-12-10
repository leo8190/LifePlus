<?php 

// controllers/crearusuario.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../models/Roles.php';
require '../views/FormAltaUsuario.php';
require '../views/ListaUsuarios.php';
require '../views/AltaUsuarioOk.php';


if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');

if(isset($_POST['ok'])) {

	if(!isset($_POST['dni'])) die("morir al crear");
	
	
	(new Usuarios)->altaUsuario($_POST['nom'],$_POST['ape'],$_POST['email'],
		$_POST['dni'], $_POST['nombre_usuario'], $_POST['password'], 
		$_POST['id_agencia'], $_POST['id_rol'], $_POST['tel'], $_POST['id_estado']);

	$u = new Usuarios;
	$todos = $u->getTodos();

	$v = new ListaUsuarios;
	$v->usuarios = $todos;
	$v->render();
}

else {

	$a = new Agencias;
	$ag = $a->getTodas();

	$r = new Roles;
	$ro = $r->getTodos();

	$form = new FormAltaUsuario;
	$form->agencias = $ag;
	$form->roles = $ro;
	$form->render();
}

