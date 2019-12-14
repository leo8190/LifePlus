<?php 

//controllers/agregarintegrante.php

require '../fw/fw.php';
require '../models/Localidades.php';
require '../models/Prospectos.php';
require '../models/Agencias.php';
require '../views/FormProspecto.php';
require '../views/FormAltaIntegrante.php';
require '../views/ListaProspectos.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');



if(isset($_POST['ok'])) {
    $integrante=(new Integrantes)->setIntegrante($_POST['nom'],$_POST['ape'],
        $_POST['num_doc'],$_POST['sexo'],$_POST['id_prospecto'],$_POST['fecha_nacimiento'],
        $_POST['tipo_ingresante']);

    //llamo de nuevo a la pantalla de ver prospecto    
    header('Location: verprospecto.php?num_prosp='.$_POST['id_prospecto']);
}

else {
    $form = new FormAltaIntegrante;
	$form->id_prospecto=$_POST['id_pr'];
	$form->render();
}

