<?php

// controllers/verusuarios.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/ListaUsuarios.php';

if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');


$u = new Usuarios;
$todos = $u->getTodos();

$v = new ListaUsuarios;
$v->usuarios = $todos;
$v->render();