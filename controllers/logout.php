<?php 
//controllers/logout.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/Login.php';

unset($_SESSION['id_usuario']);
unset($_SESSION["id_rol"]);
unset($_SESSION["nombre_rol"]);
unset($_SESSION["nombre_legajo"]);
unset($_SESSION["apellido_legajo"]);
unset($_SESSION["id_agencia"]);

header("Location: login.php");
exit;





