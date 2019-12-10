<?php 

class Seguimiento extends Model {

	public function getSeguimientos($num_prospecto){
		
		if (!isset($num_prospecto)) die('error1 models seguimiento');
		//if(!is_numeric($num_prospecto)) die("error2 models seguimiento");
		if($num_prospecto < 1) die('error3 models seguimiento');

			$this->db->query("SELECT s.id_seguimiento, DATE_FORMAT (s.fecha,
			'%d/%m/%Y') as fecha,s.descripcion,s.id_usuario,l.nombre, l.apellido, r.nombre as nombre_rol FROM seguimientos s JOIN usuarios u ON u.id_usuario=s.id_usuario JOIN legajos l ON l.id_legajo=u.id_legajo JOIN roles r ON r.id_rol=u.id_rol WHERE s.id_prospecto=" . $num_prospecto);
		return $this->db->fetchAll();
	}
	public function setSeguimiento($comentario, $id_prosp,$id_usuario){

		if (!isset($comentario)) die('error4 models seguimiento');
		if(strlen($comentario) < 1) die("error5 models seguimiento");
		$comentario = substr($comentario,0,200);
		$comentario = $this->db->escapeString($comentario);
		$comentario = str_replace('%', '\%', $comentario);
		$comentario = str_replace('_', '\_', $comentario);
		$com=$comentario;

		$u = new Usuarios;
		if (!isset($id_usuario)) die('error seg');
		if(!ctype_digit($id_usuario)) die('error seg');
		if($id_usuario < 1) die('error seg');
		if(!$u->existeUser($id_usuario)) die('error66 models seguimiento');
		$us=$id_usuario;

		$p = new Prospectos;
		if (!isset($id_prosp)) die('error seg');
		if(!ctype_digit($id_prosp)) die('error seg');
		if($id_prosp < 1) die('error seg');
		if(!($p->existeProspecto($id_prosp))) die('error seg');
		$pr=$id_prosp;


		$this->db->query("INSERT INTO seguimientos 
			(fecha,descripcion,id_prospecto,id_usuario) values (NOW(),'$com',
			$pr,$us);");

		return true;
	}
		
}