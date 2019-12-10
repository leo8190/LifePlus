<?php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/AgregarSeguimiento.php';
require '../views/FormProspecto.php';

//cambio

if(isset($_POST['agregar_comentario'])){
	if (!isset($_POST['id_pr'])) die("no se envio un id prosp");
	
	$f=new AgregarSeguimiento;
	$f->id_prospecto=$_POST['id_pr'];
	$f->nom_est_act=$_POST['nom_est'];
	$f->id_usuario=$_SESSION['id_usuario'];
	$f->render();
}

if (isset($_POST['agregar_coment'])) {
	if (!isset($_POST['id_prospecto'])) die("no se envio un id prosp");
	$f=new Seguimiento;
	$f->setSeguimiento($_POST['comentarios'], $_POST['id_prospecto'],$_SESSION['id_usuario']);


$pr = new Prospectos;
$se = new Seguimiento;
$in = new Integrantes;
$es = new Estados;
$v = new FormProspecto;

$p=$pr->getById($_POST['id_prospecto']);
$s=$se->getSeguimientos($_POST['id_prospecto']);
$i=$in->getIntegrantes($_POST['id_prospecto']);
$e=$es->getCambiosPosibles($_POST['id_prospecto']);

$v->pr = $p;
$v->seg_pr= $s;
$v->int_pr= $i;
$v->est_disp=$e;
$v->render();


}