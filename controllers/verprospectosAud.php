<?php 

//controllers/verempleados.php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/ListaProspectosAud.php';


if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');


$e = new Prospectos;
$pros = $e->getOnlyForState(9);

$v = new ListaProspectosAud;
$v->prospectos = $pros;
$v->render();
