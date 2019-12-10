<?php
//../controllers/vermovimientos.php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/VerMovimientos.php';


if(!isset($_SESSION['id_usuario'])) header('Location: login.php');

if (isset($_POST['ver_movimientos'])) {
	if (!isset($_POST['id_pr'])) die("no se envio un id prosp");

	$mov = new Movimiento;
	$f=new VerMovimientos;
	$movi=$mov->getHistorial($_POST['id_pr']);
	$f->movimientos=$movi;
	$f->id_prospecto=$_POST['id_pr'];
	$f->estado_pros=$_POST['nom_est'];

	$f->render();

	//RENDERIZAR VER MOVIMIENTOS 
}