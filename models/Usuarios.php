<?php

// models/Usuarios.php


class Usuarios extends Model {
	
	//AGREGAR NOMBRE_USUARIO
	public function getTodos() {
		$this->db->query("SELECT u.id_usuario as id_usuario, l.nombre as nombre, l.apellido as apellido, l.email as email, l.dni as dni, l.telefono as telefono, u.nombre_usuario as nombre_usuario, u.password as password, r.nombre as rol, a.nombre as agencia, e.nombre as estado
						FROM usuarios as u 
						LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
						LEFT JOIN roles as r ON u.id_rol = r.id_rol
						LEFT JOIN agencias as a ON u.id_agencia = a.id_agencia
						LEFT JOIN estados as e ON u.estado = e.id_estado 
						ORDER BY u.id_usuario");
		return $this->db->fetchAll();
	}

	public function getByRol($id_rol){

		if (!isset($id_rol)) die('error1 models usuarios');
		if(!is_numeric($id_rol)) die("error2 models usuarios");
		if($id_rol < 1) die('error3 models usuarios');

		$this->db->query("SELECT u.id_usuario as id_usuario, l.nombre as nombre, l.apellido as apellido FROM usuarios as u 
			LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
			LEFT JOIN roles as r ON u.id_rol = r.id_rol
			WHERE u.id_rol=".$id_rol.";");
		return $this->db->fetchAll(); 
	}

	public function existeUser($id_usuario){

		if (!isset($id_usuario)) die('error4 models usuarios');
		if(!is_numeric($id_usuario)) die("error5 models usuarios");
		if($id_usuario < 1) die('error6 models usuarios');

		$this->db->query("SELECT u.id_usuario FROM usuarios u
							WHERE u.id_usuario=".$id_usuario." LIMIT 1;");
		if($this->db->numRows()!=1) die("error seguridad");
		return true;
	}


	public function existeDni($dni) {

		if (!isset($dni)) die('error7 models usuarios');
		if(!is_numeric($dni)) die("error8 models usuarios");
		if($dni < 2) die('error9 models usuarios');
		
		$this->db->query("SELECT dni FROM legajos
						  WHERE dni='". $dni. "'");

		if ($this->db->numRows() == 0) return false;

		return true;
	}

	public function existeTel($telefono) {

		if (!isset($telefono)) die('error10 models usuarios');
		if(!is_numeric($telefono)) die("error11 models usuarios");
		if($telefono < 2) die('error12 models usuarios');

		$this->db->query("SELECT telefono FROM legajos
						  WHERE telefono='". $telefono. "'");

		if ($this->db->numRows() == 0) return false;
		
		return true;
	}

	public function existeEmail($email) {

		if (!isset($email)) die('error13 models usuarios');
		if(strlen($email) < 2) die("error14 models usuarios");
		$email = substr($email,0,50);
		$email = $this->db->escapeString($email);
		$email	= str_replace('%', '\%', $email);
		$email	= str_replace('_', '\_', $email);

		$this->db->query("SELECT email FROM legajos
						  WHERE email='". $email. "'");

		if ($this->db->numRows() == 0) return false;
		
		return true;

	}

	public function existeNombreUsuario($nombre_usuario) {

		if (!isset($nombre_usuario)) die('error15 models usuarios');
		if(strlen($nombre_usuario) < 2) die("error16 models usuarios");
		$nombre_usuario = substr($nombre_usuario,0,50);
		$nombre_usuario = $this->db->escapeString($nombre_usuario);
		$nombre_usuario	= str_replace('%', '\%', $nombre_usuario);
		$nombre_usuario	= str_replace('_', '\_', $nombre_usuario);

		//si existe devuelve true

		$this->db->query("SELECT nombre_usuario FROM usuarios
						  WHERE nombre_usuario='". $nombre_usuario. "'");

		if ($this->db->numRows() == 0) return false;

		return true;
	}

	public function altaUsuario($nombre,$apellido,$email,$dni, $nombre_usuario, $password,$id_agencia,$id_rol,$telefono,$id_estado) {


		if (!isset($nombre)) die('error17 models usuarios');
		if(strlen($nombre) < 2) die("error18 models usuarios");
		$nombre = substr($nombre,0,50);
		$nombre = $this->db->escapeString($nombre);
		$nombre	= str_replace('%', '\%', $nombre);
		$nombre	= str_replace('_', '\_', $nombre);

		if (!isset($apellido)) die('error19 models usuarios');
		if(strlen($apellido) < 2) die("error20 models usuarios");
		$apellido = substr($apellido,0,50);
		$apellido = $this->db->escapeString($apellido);
		$apellido	= str_replace('%', '\%', $apellido);
		$apellido	= str_replace('_', '\_', $apellido);

		if (!isset($email)) die('error21 models usuarios');
		if(strlen($email) < 2) die("error22 models usuarios");
		$email = substr($email,0,50);
		$email = $this->db->escapeString($email);
		$email	= str_replace('%', '\%', $email);
		$email	= str_replace('_', '\_', $email);

		if (!isset($dni)) die('error23 models usuarios');
		if(!is_numeric($dni)) die("error24 models usuarios");
		if($dni < 2) die('error1');

		if (!isset($nombre_usuario)) die('error25 models usuarios');
		if(strlen($nombre_usuario) < 2) die("error26 models usuarios");
		$nombre_usuario = substr($nombre_usuario,0,50);
		$nombre_usuario = $this->db->escapeString($nombre_usuario);
		$nombre_usuario	= str_replace('%', '\%', $nombre_usuario);
		$nombre_usuario	= str_replace('_', '\_', $nombre_usuario);

		if (!isset($password)) die('error27 models usuarios');
		if(strlen($password) < 2) die("error28 models usuarios");
		$password = substr($password,0,50);
		$password = $this->db->escapeString($password);
		$password	= str_replace('%', '\%', $password);
		$password	= str_replace('_', '\_', $password);

		if (!isset($id_agencia)) die('error29 models usuarios');
		if(!is_numeric($id_agencia)) die("error30 models usuarios");
		if($id_agencia < 1) die('error31 models usuarios');

		if (!isset($id_rol)) die('error32 models usuarios');
		if(!is_numeric($id_rol)) die("error33 models usuarios");
		if($id_rol < 1) die('error34 models usuarios');

		if (!isset($telefono)) die('error35 models usuarios');
		if(!is_numeric($telefono)) die("error36 models usuarios");
		if($telefono < 2) die('error37 models usuarios');

		if (!isset($id_estado)) die('error38 models usuarios');
		if(!is_numeric($id_estado)) die("error39 models usuarios");
		if($id_estado < 0) die('error40 models usuarios');
		

		if ($this->existeNombreUsuario($nombre_usuario)) die('nombre_usuario ya existe');
		if ($this->existeDni($dni)) die('dni ya existe');
		if ($this->existeTel($telefono)) die('tel ya existe');
		if ($this->existeEmail($email)) die('email ya existe');


		$this->db->query("INSERT INTO legajos (nombre, apellido, email, dni, telefono) VALUES ('$nombre', '$apellido', '$email', '$dni', '$telefono')");

		$id_legajo = $this->db->insert_id();

		$this->db->query("INSERT INTO usuarios (nombre_usuario, password, id_agencia, id_rol, estado, id_legajo) VALUES ('$nombre_usuario', '$password','$id_agencia', '$id_rol', $id_estado, $id_legajo)"); 	
	}

	public function editarUsuario($id_usuario, $id_agencia, $id_rol, $id_estado) {

		if (!isset($id_usuario)) die('error41 models usuarios');
		if(!is_numeric($id_usuario)) die("error42 models usuarios");
		if($id_usuario < 1) die('error43 models usuarios');

		if (!isset($id_agencia)) die('error58 models usuarios');
		if(!is_numeric($id_agencia)) die("error59 models usuarios");
		if($id_agencia < 1) die('error60 models usuarios');

		if (!isset($id_rol)) die('error61 models usuarios');
		if(!is_numeric($id_rol)) die("error62 models usuarios");
		if($id_rol < 1) die('error63 models usuarios');

		if (!isset($id_estado)) die('error67 models usuarios');
		if(!is_numeric($id_estado)) die("error68 models usuarios");
		if($id_estado > 1  || $id_estado < 0 ) die('error69 models usuarios');

		$this->db->query("UPDATE usuarios as u
						  LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
						  SET u.id_agencia = '$id_agencia', u.id_rol = '$id_rol', u.estado = $id_estado
						  WHERE u.id_usuario=".$id_usuario); 	
	}
	/*
	public function editarUsuario($id_usuario, $nombre, $apellido, $email, $dni, $nombre_usuario, $password, $id_agencia, $id_rol, $telefono, $id_estado) {

		if (!isset($id_usuario)) die('error41 models usuarios');
		if(!is_numeric($id_usuario)) die("error42 models usuarios");
		if($id_usuario < 1) die('error43 models usuarios');
		
		if (!isset($nombre)) die('error45 models usuarios');
		if(strlen($nombre) < 2) die("error46 models usuarios");
		$nombre = substr($nombre,0,50);
		$nombre = $this->db->escapeString($nombre);
		$nombre	= str_replace('%', '\%', $nombre);
		$nombre	= str_replace('_', '\_', $nombre);

		if (!isset($apellido)) die('error47 models usuarios');
		if(strlen($apellido) < 2) die("error48 models usuarios");
		$apellido = substr($apellido,0,50);
		$apellido = $this->db->escapeString($apellido);
		$apellido	= str_replace('%', '\%', $apellido);
		$apellido	= str_replace('_', '\_', $apellido);

		if (!isset($email)) die('error49 models usuarios');
		if(strlen($email) < 2) die("error50 models usuarios");
		$email = substr($email,0,50);
		$email = $this->db->escapeString($email);
		$email	= str_replace('%', '\%', $email);
		$email	= str_replace('_', '\_', $email);

		if (!isset($dni)) die('error51 models usuarios');
		if(!is_numeric($dni)) die("error52 models usuarios");
		if($dni < 2) die('error53 models usuarios');

		if (!isset($nombre_usuario)) die('error54 models usuarios');
		if(strlen($nombre_usuario) < 2) die("error55 models usuarios");
		$nombre_usuario = substr($nombre_usuario,0,50);
		$nombre_usuario = $this->db->escapeString($nombre_usuario);
		$nombre_usuario	= str_replace('%', '\%', $nombre_usuario);
		$nombre_usuario	= str_replace('_', '\_', $nombre_usuario);

		if (!isset($password)) die('error56 models usuarios');
		if(strlen($password) < 2) die("error57 models usuarios");
		$password = substr($password,0,50);
		$password = $this->db->escapeString($password);
		$password	= str_replace('%', '\%', $password);
		$password	= str_replace('_', '\_', $password);

		if (!isset($id_agencia)) die('error58 models usuarios');
		if(!is_numeric($id_agencia)) die("error59 models usuarios");
		if($id_agencia < 1) die('error60 models usuarios');

		if (!isset($id_rol)) die('error61 models usuarios');
		if(!is_numeric($id_rol)) die("error62 models usuarios");
		if($id_rol < 1) die('error63 models usuarios');

		if (!isset($telefono)) die('error64 models usuarios');
		if(!is_numeric($telefono)) die("error65 models usuarios");
		if($telefono < 2) die('error66 models usuarios');

		if (!isset($id_estado)) die('error67 models usuarios');
		if(!is_numeric($id_estado)) die("error68 models usuarios");
		if($id_estado < 1) die('error69 models usuarios');

		if ($this->existeNombreUsuario($nombre_usuario)) die('nombre_usuario ya existe');
		if ($this->existeDni($dni)) die('dni ya existe');
		if ($this->existeTel($telefono)) die('tel ya existe');
		if ($this->existeEmail($email)) die('email ya existe');

		$this->db->query("UPDATE usuarios as u
						  LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
						  SET l.nombre = '$nombre', l.apellido = '$apellido', l.email = '$email', l.dni = '$dni', l.telefono = '$telefono', u.nombre_usuario = '$nombre_usuario', u.password = '$password', u.id_agencia = '$id_agencia', u.id_rol = '$id_rol', u.estado = $id_estado
						  WHERE u.id_usuario=".$id_usuario); 	
	}*/

	public function existeUsuario($id_usuario) {

		if (!isset($id_usuario)) die('error70 models usuarios');
		if(!is_numeric($id_usuario)) die("error71 models usuarios");
		if($id_usuario < 1) die('error72 models usuarios');

		$this->db->query("SELECT * FROM usuarios
						  WHERE id_usuario=".$id_usuario . " LIMIT 1;");
		if ($this->db->numRows() != 1) return false;
		return true; 	
	}	

	public function getUsuario($id_usuario){
		
		if (!isset($id_usuario)) die('error73 models usuarios');
		if(!is_numeric($id_usuario)) die("error74 models usuarios");
		if($id_usuario < 1) die('error75 models usuarios');

		if ($this->existeUsuario($id_usuario) == true) {

			$this->db->query("SELECT u.id_usuario as id_usuario, u.nombre_usuario as nombre_usuario, l.nombre as nombre, l.apellido as apellido, l.email as email, l.dni as dni, l.telefono as telefono, u.password as password, r.nombre as rol,r.id_rol as id_rol, a.nombre as agencia, e.nombre as estado, u.id_agencia as id_agencia
							FROM usuarios as u 
							LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
							LEFT JOIN roles as r ON u.id_rol = r.id_rol
							LEFT JOIN agencias as a ON u.id_agencia = a.id_agencia
							LEFT JOIN estados as e ON u.estado = e.id_estado
							WHERE u.id_usuario=".$id_usuario);

			return $this->db->fetch(); 
		}
		else{
			die('no existe usuario');
		}
	}

	public function bajaUsuario($id_usuario) {

		if (!isset($id_usuario)) die('error76 models usuarios');
		if(!is_numeric($id_usuario)) die("error77 models usuarios");
		if($id_usuario < 1) die('error78 models usuarios');
		echo "ingresa con" . $id_usuario;
		//no lo elimina de la BBDD, solo le da la baja logica cambiandole el estado de 1 a 0
		$this->db->query("UPDATE usuarios as u
						  SET u.estado = 0
						  WHERE u.id_usuario=".$id_usuario); 	

	}

	

	public function getRolUsuario($id_usuario) {
		
		if (!isset($id_usuario)) die('error79 models usuarios');
		if(!is_numeric($id_usuario)) die("error80 models usuarios");
		if($id_usuario < 1) die('error81 models usuarios');

		$this->db->query("SELECT r.nombre, r.id_rol 
						FROM roles r  JOIN usuarios u ON 
						r.id_rol = u.id_rol 
						WHERE u.id_usuario=".$id_usuario." LIMIT 1;");
		
		 return $this->db->fetch(); 	
	}

	public function getVendedoresByAgencia($id_agencia){
		if (!isset($id_agencia)) die('error79 models usuarios');
		if(!is_numeric($id_agencia)) die("error80 models usuarios");
		if($id_agencia < 1) die('error81 models usuarios');

		$this->db->query("SELECT u.id_usuario as id_usuario, l.nombre as nombre, l.apellido as apellido, l.email as email, l.dni as dni, l.telefono as telefono, u.nombre_usuario as nombre_usuario, u.password as password, r.nombre as rol, a.nombre as agencia, e.nombre as estado
						FROM usuarios as u 
						LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
						LEFT JOIN roles as r ON u.id_rol = r.id_rol
						LEFT JOIN agencias as a ON u.id_agencia = a.id_agencia
						LEFT JOIN estados as e ON u.estado = e.id_estado 
						WHERE u.id_agencia=".$id_agencia." AND u.id_rol=2 ORDER BY u.id_usuario");
		return $this->db->fetchAll();
	}

	public function getAgencia($id_usuario) {
		
		if (!isset($id_usuario)) die('error82 models usuarios');
		if(!is_numeric($id_usuario)) die("error83 models usuarios");
		if($id_usuario < 1) die('error84 models usuarios');

		$this->existeUsuario($id_usuario);

		$this->db->query("SELECT u.id_agencia FROM usuarios u
						  WHERE id_usuario=".$id_usuario);
		
		 return $this->db->fetch();	
	}

	public function getNombreYApellido($id_usuario){
		
		if (!isset($id_usuario)) die('error85 models usuarios');
		if(!is_numeric($id_usuario)) die("error86 models usuarios");
		if($id_usuario < 1) die('error87 models usuarios');

		$this->db->query("SELECT u.id_usuario as id_usuario, l.nombre as nombre, l.apellido as apellido
							FROM usuarios as u 
							LEFT JOIN legajos as l ON u.id_legajo = l.id_legajo
							WHERE u.id_usuario=".$id_usuario);

			return $this->db->fetch(); 
		
	}

	public function validaLogin($usuario,$contraseña){

		if (!isset($usuario)) die('error88 models usuarios');
		//if(strlen($usuario) < 2) die("error89 models usuarios");
		$usuario = substr($usuario,0,50);
		$usuario = $this->db->escapeString($usuario);
		$usuario	= str_replace('%', '\%', $usuario);
		$usuario	= str_replace('_', '\_', $usuario);

		if (!isset($contraseña)) die('error90 models usuarios');
		//if(strlen($contraseña) < 2) die("error91 models usuarios");
		$contraseña = substr($contraseña,0,50);
		$contraseña = $this->db->escapeString($contraseña);
		$contraseña	= str_replace('%', '\%', $contraseña);
		$contraseña	= str_replace('_', '\_', $contraseña);

		$passwd = sha1($contraseña);

		$this->db->query("SELECT id_usuario from usuarios
						where nombre_usuario = '$usuario' and password = '$contraseña' LIMIT 1;");
		if ($this->db->numRows() == 0 ) return false;
		else
		return $this->db->fetch();

	}


}