<?php

// models/Agencias.php
// require '../models/Usuarios.php';

class Agencias extends Model {
	
	public function getTodas() {
		$this->db->query("SELECT a.nombre as nombre,a.id_agencia id_agencia FROM agencias a
						  WHERE a.habilitada = 1;");

		//$this->db->query("SELECT a.nombre as nombre,a.id_agencia id_agencia, 
		//	u.id_supervisor as id_sup, l.nombre nombre_sup, l.apellido ape_sup FROM agencias a 	
		//	LEFT JOIN usuarios u ON u.id_agencia=a.id_agencia
		//	LEFT JOIN legajos l ON l.id_legajo=u.id_legajo;");


		return $this->db->fetchAll();
	}

	public function editarAgencia($id_agencia, $nombre) {

		if (!isset($id_agencia)) die('error41 models agencia');
		
		if(!is_numeric($id_agencia)) die("error42 models agencia");
		if($id_agencia < 1) die('error43 models agencia');

	

		$this->db->query("UPDATE agencias as a
						   SET  a.nombre = '$nombre'
						  WHERE a.id_agencia=".$id_agencia); 	
	}
	public function getAgencia($num_agencia){
		
		if (!isset($num_agencia)) die('error 1, models agencia');
		if(!is_numeric($num_agencia)) die("error2, models agencia");
		if($num_agencia < 1) die('error3 models agencia');		

		//n° de la agencia , nombre de la agencia, nombre del responsable (e id), 
		
		$this->db->query("SELECT a.nombre as nombre,a.id_agencia id_agencia FROM agencias a 	
			WHERE a.id_agencia=".$num_agencia);
		return $this->db->fetch(); 
	}

	public function alta($nombre) {

		if (!isset($nombre)) die('error4, models agencia');
		if(strlen($nombre) < 2) die("error5, models agencia");
		$nombre = substr($nombre,0,50);
		$nombre = $this->db->escapeString($nombre);
		$nombre	= str_replace('%', '\%', $nombre);
		$nombre	= str_replace('_', '\_', $nombre);		

		//$this->db->query("insert into agencias (nombre) values('".$nombre."')"); 	
		$this->db->query("INSERT INTO agencias (nombre, habilitada) values('$nombre', 1);"); 
	}

	public function deshabilitar($id_agencia) {

		if (!isset($id_agencia)) die('error 6, models agencia');
		if(!is_numeric($id_agencia)) die("error7, models agencia");
		if($id_agencia < 1) die('error8 models agencia');	

		$this->db->query("UPDATE agencias
						  SET `habilitada`=0
						  WHERE id_agencia=".$id_agencia); 
	}

	public function tieneUsuariosAsociados($id_agencia) {

		if (!isset($id_agencia)) die('error9, models agencia');
		if(!is_numeric($id_agencia)) die("error10, models agencia");
		if($id_agencia < 1) die('error11 models agencia');	

	/*	$this->db->query("SELECT EXISTS(SELECT * FROM usuarios
						  WHERE id_agencia=".$id_agencia.")"); */
		
		$this->db->query("SELECT * FROM usuarios
						  WHERE id_agencia=".$id_agencia);

		return $this->db->fetchAll();						  
	}

	public function getAgenciaByLocalidad($id_loc){
		if (!isset($id_loc)) die('error 1, models agencia');
		if(!is_numeric($id_loc)) die("error2, models agencia");
		if($id_loc < 0) die('error3 models agencia');		
		
		$this->db->query("SELECT a.nombre as nombre,a.id_agencia id_agencia FROM agencias a JOIN localidad l 	
			ON a.id_agencia = l.id_agencia WHERE l.id=".$id_loc);
		return $this->db->fetch(); 
	}


}