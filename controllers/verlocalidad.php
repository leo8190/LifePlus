<?php 

//controllers/verlocalidad.php

require '../fw/fw.php';
require '../models/Localidades.php';
require '../models/Agencias.php';
require '../views/VerLocalidad.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');

$l = new Localidades;
if (!isset($_GET['id_loc'])) die("error"); 
$locs= $l->getTodas();
$lo= $l->getLocalidad($_GET['id_loc']);

$a = new Agencias;
$ag= $a->getTodas(); 

$v = new VerLocalidad;
$v->localidad = $lo;
$v->localidades = $locs;
$v->agencias = $ag;
$v->render();