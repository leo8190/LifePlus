<?php 

// models/Integrantes.php

class Integrantes extends Model {

	public function getIntegrantes($num_prospecto){
		if(!isset($num_prospecto)) die('error1 models integrantes');
		if(!is_numeric($num_prospecto)) die("error 2, models integrantes");
		if($num_prospecto< 1) die("error 3, models integrantes");

		$prosAux = new Prospectos;
		$prosAux->existeProspecto($num_prospecto);

		$this->db->query("SELECT i.id_integrante id_integrante, i.tipo_ingresante parentezco, i.nombre nombre, i.apellido apellido, i.dni dni, i.sexo sexo, i.fecha_nacimiento fech_nac FROM integrantes i WHERE i.id_prospecto=".$num_prospecto);
		return $this->db->fetchAll();
	}
	public function borrarIntegrante($id_int){
		
		if(!isset($id_int)) die('error4 models integrantes');
		if(!is_numeric($id_int)) die("error 5, models integrantes");
		if($id_int< 1) die("error 6, models integrantes");

		$this->db->query("DELETE FROM integrantes WHERE id_integrante=".$id_int. " LIMIT 1;");
		return true;
	}

	public function modificarIntegrante($id_int,$n,$a,$d,$s,$id_p,$fn,$tipo){
		
		$prosAux = new Prospectos;
		$prosAux->existeProspecto($id_p);

		if (!isset($id_int)) die('error1');
		if(!is_numeric($id_int)) die("error1");
		if($id_int< 1) die("error1");

		if (!isset($n)) die('error1');
		if(strlen($n) < 2) die("error1");
		$n = substr($n,0,50);
		$n = $this->db->escapeString($n);
		$n	= str_replace('%', '\%', $n);
		$n	= str_replace('_', '\_', $n);

		if (!isset($a)) die('error1');
		if(strlen($a) < 2) die("error1");
		$a = substr($a,0,50);
		$a = $this->db->escapeString($a);
		$a	= str_replace('%', '\%', $a);
		$a	= str_replace('_', '\_', $a);

		if (!isset($d)) die('error1');
		if(strlen($d) < 2) die("error1");
		$d = substr($d,0,50);
		$d = $this->db->escapeString($d);
		$d	= str_replace('%', '\%', $d);
		$d	= str_replace('_', '\_', $d);

		if (!isset($s)) die('error1');
		if(strlen($s) != 1) die("error1");
		$s = substr($s,0,1);
		$s = $this->db->escapeString($s);
		$s	= str_replace('%', '\%', $s);
		$s	= str_replace('_', '\_', $s);

		if (!isset($id_p)) die('error1');
		if(!ctype_digit($id_p)) die("error1");
		if($id_p< 1) die("error1");

		if (!isset($fn)) die('error1');
		if(strlen($fn) < 2) die("error1");
		$fn = substr($fn,0,50);
		$fn = $this->db->escapeString($fn);
		$fn	= str_replace('%', '\%', $fn);
		$fn	= str_replace('_', '\_', $fn);

		if (!isset($tipo)) die('error1');
		if(!is_numeric($tipo)) die("error1");
		if($tipo< 1) die("error1");

		$this->db->query("UPDATE integrantes SET nombre='$n' apellido='$a' dni=$d sexo='$s' fecha_nacimiento='$fn' tipo_ingresante='$tipo' WHERE id_integrante=$id_int LIMIT 1;");
		return true;
	}

	public function setIntegrante($n,$a,$d,$s,$id_p,$fn,$tipo){

		$prosAux = new Prospectos;
		$prosAux->existeProspecto($id_p);

		if (!isset($n)) die('error1');
		if(strlen($n) < 2) die("error1");
		$n = substr($n,0,50);
		$n = $this->db->escapeString($n);
		$n	= str_replace('%', '\%', $n);
		$n	= str_replace('_', '\_', $n);

		if (!isset($a)) die('error1');
		if(strlen($a) < 2) die("error1");
		$a = substr($a,0,50);
		$a = $this->db->escapeString($a);
		$a	= str_replace('%', '\%', $a);
		$a	= str_replace('_', '\_', $a);

		if (!isset($d)) die('error1');
		if(strlen($d) < 2) die("error1");
		$d = substr($d,0,50);
		$d = $this->db->escapeString($d);
		$d	= str_replace('%', '\%', $d);
		$d	= str_replace('_', '\_', $d);

		if (!isset($s)) die('error1');
		if(strlen($s) != 1) die("error1");
		$s = substr($s,0,1);
		$s = $this->db->escapeString($s);
		$s	= str_replace('%', '\%', $s);
		$s	= str_replace('_', '\_', $s);

		if (!isset($id_p)) die('error1');
		if(!is_numeric($id_p)) die("error1");
		if($id_p< 1) die("error1");

		if (!isset($fn)) die('error1');
		if(strlen($fn) < 2) die("error1");
		$fn = substr($fn,0,50);
		$fn = $this->db->escapeString($fn);
		$fn	= str_replace('%', '\%', $fn);
		$fn	= str_replace('_', '\_', $fn);

		if (!isset($tipo)) die('error1');
		if(!is_numeric($tipo)) die("error1");
		if($tipo< 1) die("error1");

		$this->db->query("INSERT INTO integrantes (nombre,apellido,dni,sexo,fecha_nacimiento,id_prospecto,tipo_ingresante) values ('$n','$a',$d,'$s','$f',$id_p,$t)");
		return true;
	}
}