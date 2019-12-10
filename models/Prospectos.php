<?php

// models/Prospectos.php
require '../models/Seguimiento.php';
require '../models/Integrantes.php';
require '../models/Movimientos.php';
require '../models/Estados.php';
require '../models/Usuarios.php';


class Prospectos extends Model {
	

	public function getTodos() {
		$this->db->query("SELECT p.id_prospectos as id_prospectos, p.nombre as nombre, p.apellido as apellido, e.nombre as estado,DATE_FORMAT (p.fecha_alta,
			'%d/%m/%Y') as fecha_alta from prospectos p LEFT JOIN estados e ON p.estado_actual =e.id_estado ORDER BY p.fecha_alta DESC");
		return $this->db->fetchAll();
	}

	public function getById($num_prospecto){
		
		if (!isset($num_prospecto)) die('error 1, models prospectos');
		if(!is_numeric($num_prospecto)) die("error2, models prospectos");
		if($num_prospecto < 1) die('error3 models prospectos');	

		$this->db->query("SELECT p.id_prospectos,p.estado_actual, a.nombre agencia, le.nombre vendedor, e.nombre estado, l.nombre localidad, p.nombre, 
			p.apellido, p.email, DATE_FORMAT (p.fecha_alta,
			'%d/%m/%Y') as fecha_alta , p.sexo 
			FROM prospectos p 
			LEFT JOIN estados e ON e.id_estado = p.estado_actual 
			LEFT JOIN localidad l ON p.localidad=l.id 
			LEFT JOIN legajos le ON le.id_legajo = (select id_legajo FROM usuarios WHERE id_usuario=p.vendedor) 
			LEFT JOIN agencias a ON a.id_agencia=l.id_agencia 
			WHERE p.id_prospectos=".$num_prospecto." LIMIT 1;");
		return $this->db->fetch(); 		
	}


	// public function getOnlyForState($estado) {

	// 	if (!isset($estado)) die('error 4, models prospectos');
	// 	if(!is_numeric($estado)) die("error5, models prospectos");
	// 	if($estado < 1) die('error6 models prospectos');

	// 	$this->db->query("SELECT p.id_prospectos as id_prospectos, p.nombre as nombre, p.apellido as apellido, e.nombre as estado, p.fecha_alta as fecha_alta from prospectos p LEFT JOIN estados e ON p.estado_actual =e.id_estado WHERE e.id_estado = 9 ORDER BY p.fecha_alta DESC");
	// 	return $this->db->fetchAll();

	// }


	// public function getByEstadosYAgencia($rol_us,$id_agencia){
	// 	//ssi la agencia es 0 y no tiene estados en particular, hago una consulta
	// 	//pidiendo todos los prospectos
	// 	//si la agencia tiene otro numero que no es 0 y no tiene estados permitidos
	// 	//hago una consulta pidiendo todos los prospectos de la agencia
	// 	//si tiene numero diferente de 0 y estados permitidos, hago consulta con 
	// 	//estados permitidos y la agencia en particular 
	// 	//quedarian tres consultas diferentes segun el caso 

	// 	if (!isset($rol_us)) die('error 7, models prospectos');
	// 	if(!is_numeric($rol_us)) die("error8, models prospectos");
	// 	if($rol_us < 1) die('error9 models prospectos');

	// 	if (!isset($id_agencia)) die('error 10, models prospectos');
	// 	if(!is_numeric($id_agencia)) die("error11, models prospectos");
	// 	if($id_agencia < 1) die('error12 models prospectos');

	// 			$auxEstado= new Estados;
	// 			$estados_permitidos=$auxEstado->getByRol($rol_us);

	// }

	public function getByUser($id_usuario, $id_rol, $id_agencia){

		if (!isset($id_usuario)) die('error 13, models prospectos');
		if(!is_numeric($id_usuario)) die("error14, models prospectos");
		if($id_usuario < 1) die('error15 models prospectos');

		if (!isset($id_rol)) die('error 16, models prospectos');
		if(!is_numeric($id_rol)) die("error17, models prospectos");
		if($id_rol < 1) die('error18 models prospectos');

		if (!isset($id_agencia)) die('error 19, models prospectos');
		if(!is_numeric($id_agencia)) die("error20, models prospectos");
		if($id_agencia < 1) die('error21 models prospectos');

		$auxUs= new Usuarios;
		
		if($id_rol==1 OR $id_rol==5) return $this->getTodos();
		
		if($id_rol==4 OR $id_rol==6){
				$auxEst=new Estados;
				$est = $auxEst->getDisponiblesByRol($id_rol);

				$estados = implode("','",$est);		
				//var_dump(array_values($est));

				$this->db->query("SELECT p.id_prospectos id_prospectos, p.nombre nombre, p.apellido apellido, e.nombre estado, DATE_FORMAT (p.fecha_alta,
			'%d/%m/%Y') as fecha_alta FROM prospectos p LEFT JOIN estados e ON p.estado_actual =e.id_estado WHERE p.estado_actual IN(" . $estados .");");

				return $this->db->fetchAll();
			}
				if ($id_rol==3) {

					$this->db->query("SELECT p.localidad localidad, p.id_prospectos id_prospectos, p.nombre nombre, p.apellido apellido, e.nombre estado, DATE_FORMAT (p.fecha_alta,
			'%d/%m/%Y') as fecha_alta FROM prospectos p LEFT JOIN estados e ON p.estado_actual =e.id_estado JOIN localidad l ON l.id=p.localidad WHERE l.id_agencia=".$id_agencia.";");

				return $this->db->fetchAll();
				}
				if ($id_rol==2) {
					$auxEst= new Estados;
					$est= $auxEst->getDisponiblesByRol($id_rol);

					$estados = implode("','",$est);		
					//var_dump(array_values($est));

					$this->db->query("SELECT p.id_prospectos id_prospectos, p.nombre nombre, p.apellido apellido, e.nombre estado, DATE_FORMAT (p.fecha_alta,
			'%d/%m/%Y') as fecha_alta FROM prospectos p JOIN estados e ON p.estado_actual =e.id_estado WHERE p.vendedor=".$id_usuario." AND (p.estado_actual IN (".$estados."));");
						return $this->db->fetchAll();
				}
	}


	private function getByRol($id_rol){

		if (!isset($id_rol)) die('error 22, models prospectos');
		if(!is_numeric($id_rol)) die("error23, models prospectos");
		if($id_rol < 1) die('error24 models prospectos');

		$est_permitidos = $auxEstado->getByUser($id_user);
		$this->db->query("SELECT p.id_prospectos as id_prospectos, p.nombre as nombre, p.apellido as apellido, e.nombre as estado, DATE_FORMAT (p.fecha_alta,
			'%d/%m/%Y') as fecha_alta from prospectos p LEFT JOIN estados e ON   WHERE p.id_estado= (SELECT p.id_prospectos FROM prospectos p WHERE p.estado_actual IN (SELECT re.id_estado_permitido FROM rol_estprosp_permitidos re JOIN usuarios u ON u.id_rol=".$id_rol.";) ORDER BY p.fecha_alta DESC");
		return $this->db->fetchAll();
	}

	public function alta($nombre,$apellido,$email,$dni,$sexo,$tel) {

		if (!isset($nombre)) die('error25 models prospectos');
		if(strlen($nombre) < 2) die("error26 models prospectos");
		$nombre = substr($nombre,0,50);
		$nombre = $this->db->escapeString($nombre);
		$nombre	= str_replace('%', '\%', $nombre);
		$nombre	= str_replace('_', '\_', $nombre);

		if (!isset($apellido)) die('error27 models prospectos');
		if(strlen($apellido) < 2) die("error28 models prospectos");
		$apellido = substr($apellido,0,50);
		$apellido = $this->db->escapeString($apellido);
		$apellido	= str_replace('%', '\%', $apellido);
		$apellido	= str_replace('_', '\_', $apellido);

		if (!isset($email)) die('error29 models prospectos');
		if(strlen($email) < 2) die("error30 models prospectos");
		$email = substr($email,0,50);
		$email = $this->db->escapeString($email);
		$email	= str_replace('%', '\%', $email);
		$email	= str_replace('_', '\_', $email);

		if (!isset($dni)) die('error31 models prospectos');
		if(!is_numeric($dni)) die("error32 models prospectos");
		if($dni < 2) die('error33 models prospectos');

		if (!isset($sexo)) die('error34 models prospectos');
		if(strlen($sexo) != 1 ) die("error35 models prospectos");
		$sexo = substr($sexo,0,2);
		$sexo = $this->db->escapeString($sexo);
		$sexo	= str_replace('%', '\%', $sexo);
		$sexo	= str_replace('_', '\_', $sexo);

		if (!isset($tel)) die('error36 models prospectos');
		if(!is_numeric($tel)) die("error37 models prospectos");
		if($tel < 2) die('error38 models prospectos');

		//Fecha actual
		$fecha_actual = date('y')."-".date('m')."-".date('d');

		$this->db->query("INSERT INTO prospectos (nombre,apellido,email,dni,sexo,fecha_alta,estado_actual) values ('$nombre','$apellido','$email',$dni,'$sexo',now(), 1)"); 
		$id=$this->db->insert_id();
		$this->db->query("INSERT INTO integrantes (nombre,apellido,dni,sexo,id_prospecto) values ('$nombre','$apellido',$dni,'$sexo',$id)");
		$this->db->query("INSERT INTO telefonos_pros (telefono,id_prospecto) values ($tel,$id)");

		return $id;
	}

	
	public function setState($idprospecto, $estado){
		//var_dump($idprospecto);
		//var_dump($estado);

		if (!isset($idprospecto)) die('error39 models prospectos');
		if(!is_numeric($idprospecto)) die("error40 models prospectos");
		if($idprospecto < 1) die('error41 models prospectos');

		if (!isset($estado)) die('error42 models prospectos');
		if(!is_numeric($estado)) die("error43 models prospectos");
		if($estado < 1) die('error44 models prospectos');

		$this->db->query("UPDATE prospectos 
						  SET estado_actual=$estado
						  WHERE id_prospectos=$idprospecto");

	}
	public function getComments($idprospecto){

		if (!isset($idprospecto)) die('error45 models prospectos');
		if(!is_numeric($idprospecto)) die("error46 models prospectos");
		if($idprospecto < 1) die('error47 models prospectos');

		$this->db->query("SELECT * FROM seguimientos 
							WHERE id_prospecto=$idprospecto
							ORDER BY fecha DESC");
		return $this->db->fetch(); 
	}
	public function setComments($idusuario, $idprospecto, $comentario){

		if (!isset($idusuario)) die('error48 models prospectos');
		if(!is_numeric($idusuario)) die("error49 models prospectos");
		if($idusuario < 1) die('error50 models prospectos');

		if (!isset($idprospecto)) die('error51 models prospectos');
		if(!is_numeric($idprospecto)) die("error52 models prospectos");
		if($idprospecto < 1) die('error53 models prospectos');

		if (!isset($comentario)) die('error54 models prospectos');
		if(strlen($comentario) < 2 ) die("error55 models prospectos");
		$comentario = substr($comentario,0, 2000);
		$comentario = $this->db->escapeString($comentario);
		$comentario	= str_replace('%', '\%', $comentario);
		$comentario	= str_replace('_', '\_', $comentario);

		$fecha_actual = date('y')."-".date('m')."-".date('d');
		$this->db->query("INSERT INTO seguimientos (fecha, descripcion, id_prospecto, id_usuario)  
							VALUES ( now(), '$comentario', $idprospecto, $idusuario)");

	}

	public function existeProspecto($num_prospecto){

		if (!isset($num_prospecto)) die('error56 models prospectos');
		if(!is_numeric($num_prospecto)) die("error57 models prospectos");
		if($num_prospecto < 1) die('error58 models prospectos');

		$this->db->query("SELECT p.id_prospectos FROM prospectos p WHERE p.id_prospectos=". $num_prospecto . " LIMIT 1;");
		if($this->db->numRows()!=1) die("error seguridad");
		return true;
	}

	public function getEstado($num_prospecto){

		if (!isset($num_prospecto)) die('error58,2 models prospectos');
		if(!is_numeric($num_prospecto)) die("error58,3 models prospectos");
		if($num_prospecto < 1) die('error58,4 models prospectos');
		
		$this->db->query("SELECT e.id_estado, e.nombre FROM estados e LEFT JOIN prospectos p ON p.estado_actual=e.id_estado WHERE p.id_prospectos=". $num_prospecto." LIMIT 1;");
		return $this->db->fetch();
	}

	public function cambiarEstado($id_prospectos,$est_act,$est_nuevo){

		if (!isset($id_prospectos)) die('error58,5 models prospectos');
		if(!is_numeric($id_prospectos)) die("error58,6 models prospectos");
		if($id_prospectos < 1) die('error58,7 models prospectos');

		if(!isset($est_act)) die('error59 models prospectos}');
		if(!is_numeric($est_act)) die("error 60, models prospectos");
		if($est_act< 1) die("error 61, models prospectos");

		if(!isset($est_nuevo)) die('error62 models prospectos');
		if(!is_numeric($est_nuevo)) die("error 63, models prospectos");
		if($est_nuevo< 1) die("error 64, models prospectos");

		$auxEst=new Estados;
		$auxEst->verificarCambioEstado($est_act,$est_nuevo);

		$this->db->query("UPDATE prospectos as p SET p.estado_actual=". $est_nuevo. " 
						WHERE id_prospectos=".$id_prospectos . " LIMIT 1;");

	}
}
