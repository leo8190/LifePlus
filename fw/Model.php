<?php

// models/Model.php


abstract class Model {

	protected $db;

	public function __construct() {
		$this->db = Database::getInstance();
	}

}
