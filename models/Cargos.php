<?php 


class Cargos extends Model {

	public function getTodos() {
		$this->db->query("select * from cargos");
		return $this->db->fetchAll();
	}

	public function existe($cargo){
		
		if (!isset($cargo)) die('error1, models cargos');
		if(!is_numeric($cargo)) return false;
		if($cargo < 1) die('error2, models cargos');

		$this->db->query("select * from cargos where cargo_id=$cargo limit 1");
		if($this->db->numRows() != 1) return false; 

		return true;  asdqwe
	}

}