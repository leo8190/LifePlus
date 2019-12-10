<?php

// models/Provincias.php


class Provincias extends Model {
	
	public function getTodas() {
		$this->db->query("SELECT id_provincia,nombre 
						  FROM provincias");
		return $this->db->fetchAll();
	}





}