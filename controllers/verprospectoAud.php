<?php 

//controllers/verprospectoAud.php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/FormProspectoAud.php';
require '../views/ListaProspectosAud.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');



if(isset($_POST['Actualizar'])) {

	if(!isset($_POST['id_pros'])) die("no hay id");
	if(!isset($_POST['estados_aud'])) die("no hay estado seleccionado");
	if(!isset($_POST['comment'])) die("no hay comentarios");

	$idprospecto = $_POST['id_pros'];
	$estado = $_POST['estados_aud'];
	$comentarios = $_POST['comment'];

	(new Prospectos)->setState($idprospecto,$estado);
	(new Prospectos)->setComments(26,$idprospecto,$comentarios);

	$pr = new Prospectos;
	$p= $pr->getProspecto($_POST['id_pros']);
	$v = new FormProspectoAud;
	$v->prospectos = $p;
	$v->render();



}
if(isset($_POST['Volver'])) {


	$e = new Prospectos;
	$pros = $e->getOnlyForState(9);
	$v = new ListaProspectosAud;
	$v->prospectos = $pros;
	$v->render();


}
else {

	$pr = new Prospectos;
	$p= $pr->getProspecto($_GET['num_prosp']);
	$c= $pr->getComments($_GET['num_prosp']);
	
	$v = new FormProspectoAud;
	$v->comentarios = $c;
	$v->prospectos = $p;
	$v->render();

};



