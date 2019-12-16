<?php

// controllers/verestadisticas.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/VerEstadisticas.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');

$u = new Usuarios;
$todos = $u->getTodosMasCantProspPorCadaUno();

$v = new VerEstadisticas;
$v->usuarios = $todos;
$v->render();