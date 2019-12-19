<?php

function phpAlert($msg) 
{ 
	echo '<script type="text/javascript">alert("' . $msg . '")</script>'; 
}

// controllers/editarusuario.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../models/Usuarios.php';
require '../models/Estados.php';
require '../models/Roles.php';
require '../views/FormEdicionUsuario.php';
require '../views/ListaUsuarios.php';
require '../views/EdicionUsuarioOk.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1 && $_SESSION['id_rol'] != 3) header('Location: verprospectos.php');

if (isset($_POST['modif'])) {
	$us = new Usuarios;
	
	$us->editarUsuario($_POST['id_usuario'], $_POST['id_agencia'], $_POST['id_rol'], $_POST['id_estado']);

	
/*	$v = new EdicionUsuarioOk;
	$v->render();*/
	phpAlert("Modificación realizada correctamente");
	$todos = $us->getTodos();

	$v = new ListaUsuarios;
	$v->usuarios = $todos;
	$v->render();
}

else{
	

	$us = new Usuarios;
	$u= $us->getUsuario($_GET['id_usu']);

	$a = new Agencias;
	$ag = $a->getTodas();

	$r = new Roles;
	$ro = $r->getTodos();

	$v = new FormEdicionUsuario;
	$v->usuario = $u;
	$v->agencias = $ag;
	$v->roles = $ro;
	$v->render();
}