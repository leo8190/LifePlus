<?php 
//controllers/login.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/Login.php';



if(isset($_POST["usuario"])){
	
	if(!isset($_POST["password"])) throw new Exception("Ingrese contraseña");
	$id_usuario = (new Usuarios)->validaLogin($_POST["usuario"],$_POST["password"]);

	if($id_usuario == false) {
		header("location:../controllers/login.php");
		$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';
	}
	else{
		$var_user;
		$var_user = (new Usuarios)->getUsuario($id_usuario['id_usuario']);

		$_SESSION["id_rol"] = $var_user["id_rol"];
		$_SESSION["nombre_rol"] = $var_user["rol"];
		$_SESSION["nombre_legajo"] = $var_user['nombre'];
		$_SESSION["apellido_legajo"] = $var_user["apellido"];	
		$_SESSION["id_usuario"] = $var_user['id_usuario'];
		$_SESSION["id_agencia"] = $var_user['id_agencia'];
	
		header("location:../controllers/verprospectos.php");
	}
}

else{
	$v = new Login();
	$v->render();	
}