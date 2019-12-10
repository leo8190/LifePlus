<?php

// models/Roles.php


class Roles extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT id_rol, nombre 
						  FROM roles");
		return $this->db->fetchAll();
	}

	

}