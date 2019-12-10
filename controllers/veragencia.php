<?php 

//controllers/veragencia.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../views/VerAgencia.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');

$a = new Agencias;

if (!isset($_GET['num_agen'])) die("error"); 
$ag= $a->getAgencia($_GET['num_agen']);
$v = new VerAgencia;
$v->agencias = $ag;



//toma todos los supervisores
//$usaux = new Usuarios;
//$v->supervisores=$usaux->getByRol("3");
$v->render();