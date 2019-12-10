<?php 

//controllers/verempleados.php

require '../fw/fw.php';
require '../models/Prospectos.php';
require '../views/ListaProspectos.php';
// aca se verifica que usuario es con las variables de session
// una vez hecho esto, verificamos con prospectos mediante n° de agencia del usuario y rol del usuario

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');

$e = new Prospectos;
//aca irian las variables de sesión
$todos = $e->getByUser($_SESSION['id_usuario'], $_SESSION['id_rol'], $_SESSION['id_agencia']);
//$id_usuario, $id_rol, $id_agencia
$v = new ListaProspectos;
$v->prospectos = $todos;
$v->render();
