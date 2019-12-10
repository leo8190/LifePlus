<?php 

//controllers/verprospecto.php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/FormProspecto.php';
require '../views/EditarEstado.php';

//se agregan las variables de seguimiento e integrantes
//en clase prospectos se indica require '../models/Integrantes.php' y require '../models/Seguimiento.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');

if (isset($_GET['num_prosp']))
{

$pr = new Prospectos;
$se = new Seguimiento;
$in = new Integrantes;
$es = new Estados;
$v = new FormProspecto;

$p=$pr->getById($_GET['num_prosp']);
$s=$se->getSeguimientos($_GET['num_prosp']);
$i=$in->getIntegrantes($_GET['num_prosp']);
$e=$es->getCambiosPosibles($p['estado_actual']);

$v->pr = $p;
$v->seg_pr= $s;
$v->int_pr= $i;
$v->est_disp=$e;
$v->render();

}




