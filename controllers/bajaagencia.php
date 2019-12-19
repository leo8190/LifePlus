<?php 

function phpAlert($msg) 
{ 
	echo '<script type="text/javascript">alert("' . $msg . '")</script>'; 
}
		

//controllers/bajaagencia.php

require '../fw/fw.php';
require '../models/Agencias.php';
require '../views/ListaAgencias.php';


if(!isset($_SESSION['id_usuario'])) header('Location: login.php');
if($_SESSION['id_rol'] != 1) header('Location: verprospectos.php');

if(isset($_POST['ok'])) {


	if(!isset($_POST['id_agencia'])) die("no se envio agencia");
	
	$a = new Agencias;
	$variable = $a->tieneUsuariosAsociados($_POST['id_agencia']);

/*	$variable.count
	$tieneUsuariosAsociados = $a->tieneUsuariosAsociados($_POST['id_agencia']);
	$array = $tieneUsuariosAsociados 
	$x = $array.count()
	$firstKey = array_key_first($array);
	$value = $array[$firstKey];*/

if(count($variable) == "0") {
	(new Agencias)->deshabilitar($_POST['id_agencia']);	
}
else {
	phpAlert( "La agencia no puede darse de baja porque tiene usuarios asociados a la misma" ); 	
}
	/*if($value == "0"){
		(new Agencias)->deshabilitar($_POST['id_agencia']);		
	}
	else{		
		phpAlert( "La agencia no puede darse de baja porque tiene usuarios asociados a la misma" ); 					
	}*/
	$e = new Agencias;
	$todos = $e->getTodas();
	$v = new ListaAgencias;
	$v->agencias = $todos;
	$v->render();
}

else {

	die("No se puede hacer esto");

}

