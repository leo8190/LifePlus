<?php

// controllers/bajausuario.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../models/Roles.php';
require '../models/Estados.php';
require '../views/BajaUsuarioOk.php';


if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');
	
(new Usuarios)->bajaUsuario($_POST['id_usuario']);

$ok = new BajaUsuarioOk;
$ok->render();

