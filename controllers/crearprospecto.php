<?php 

//controllers/prospecto.php

require '../fw/fw.php';
require '../models/Localidades.php';
require '../models/Prospectos.php';
require '../models/Agencias.php';
require '../views/FormProspecto.php';
require '../views/FormAltaProspecto.php';
require '../views/ListaProspectos.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');



if(isset($_POST['ok'])) {


	if(!isset($_POST['num_doc'])) die("morir al crear");
	// var_dump($_POST['nom']);
	// var_dump($_POST['ape']);
	// var_dump($_POST['email']);
	// var_dump($_POST['num_doc']);
	// var_dump($_POST['sexo']);

	$agencia = (new Agencias)->getAgenciaByLocalidad($_POST['localidad']);	
	$vendedores = (new Usuarios)->getVendedoresByAgencia($agencia['id_agencia']);

	$vendedorAsignado = $vendedores[array_rand($vendedores)];
	$vendedorAsignadoID = $vendedorAsignado['id_usuario'];

	$id=(new Prospectos)->alta($_POST['nom'],$_POST['ape'],$_POST['email'],$_POST['num_doc'],$_POST['sexo'],$_POST['tel'],$vendedorAsignadoID,$_POST['localidad'] );

$pr = new Prospectos;
$se = new Seguimiento;
$in = new Integrantes;

$p=$pr->getById($id);
$s=$se->getSeguimientos($id);
$i=$in->getIntegrantes($id);

$v = new FormProspecto;
$v->pr = $p;
$v->seg_pr= $s;
$v->int_pr= $i;
$v->render();



}

else {
	$auxloc= new Localidades;
	$form = new FormAltaProspecto;
	$form->localidades=$auxloc->getTodas();
	$form->render();


}

