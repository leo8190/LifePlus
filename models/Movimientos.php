<?php

/**
 * 
 */
class Movimiento extends model
{
	public function setMovimiento($id_prospecto,$estado_nuevo,$id_usuario){

		if (!isset($id_usuario)) die('error mov');
		if(!ctype_digit($id_usuario)) die('error mov');
		if($id_usuario < 1) die('error mov');
		$u = new Usuarios;
		if(!$u->existeUser($id_usuario)) die('error mov');
		$us=$id_usuario;


		if (!isset($id_prospecto)) die('error mov');
		if(!ctype_digit($id_prospecto)) die('error mov');
		if($id_prospecto < 1) die('error mov');
		$p = new Prospectos;
		if(!($p->existeProspecto($id_prospecto))) die('error mov');
		$pr=$id_prospecto;

		if (!isset($estado_nuevo)) die('error mov');
		if(!ctype_digit($estado_nuevo)) die('error mov');
		if($estado_nuevo < 1) die('error mov');
		$e = new Estados;
		if(!$e->existeEstado($estado_nuevo)) die('error mov');
		$es=$estado_nuevo;

		$this->db->query("INSERT INTO movimientos 
			(id_prospecto,fecha,estado_nuevo,id_usuario) values ($pr,now(),
			$es,$us);");

		return true;

	}

	public function getHistorial($id_prospecto){

		if (!isset($id_prospecto)) die('error mov');
		if(!ctype_digit($id_prospecto)) die('error mova');
		if($id_prospecto < 1) die('error mov');
		$p = new Prospectos;
		if(!$p->existeProspecto($id_prospecto)) die('error mov existe pr');
		$pr=$id_prospecto;

		$this->db->query("SELECT m.id_prospecto, DATE_FORMAT (m.fecha,
			'%d/%m/%Y') as fecha, m.estado_nuevo,m.id_usuario, e.nombre as est_nombre, r.nombre as rol_nombre, u.nombre_usuario 
			FROM movimientos m JOIN estados e ON e.id_estado=m.estado_nuevo 
			JOIN usuarios u ON m.id_usuario=u.id_usuario 
			JOIN roles r ON  r.id_rol=u.id_rol
			WHERE m.id_prospecto=".$pr.";");

		return $this->db->fetchAll();
	}
}