<?php 

//Clase que abastrae a la base de datos (la representa, encapsula)
//SINGLETON
class Database { 

	private $res;
	private $cn = false;
	private static $instance = false;

	private function __construct() { } // 1-Constructor Privado

	public static function getInstance() { //Hacemos el constructor a mano ()
		if(! self::$instance) self::$instance = new Database; 
		return self::$instance; 
	}

	private function connectIfNotConnected() {
		if(!$this->cn)
		$this->cn = mysqli_connect("localhost","root","","life_plus");
	}

	public function query($q) {
		$this->connectIfNotConnected();
		$this->res = mysqli_query($this->cn,$q); //se usa el this para hacer referencia a la variable de instancia
		if(mysqli_error($this->cn) != "") 
			die("Error consulta $q ---  " . mysqli_error($this->cn));
	}

	public function fetch() {
		if(!$this->res) throw new Exception("No se puede hacer fetch sin resultados");
		return mysqli_fetch_assoc($this->res);
	}

	public function fetchAll() {
		if(!$this->res) throw new Exception("No se puede hacer fetch sin resultados");
		
		$aux = array();
		while($fila = $this->fetch()) $aux[] = $fila;
		return $aux;
	}

	public function numRows() {
		return mysqli_num_rows($this->res);
	}

	public function escapeString($str) {
		$this->connectIfNotConnected();
		return mysqli_escape_string($this->cn, $str);
	}

	//public function devolverUltimoIdGenerado() {
	//	return $this->cn->insert_id;
	//}

	public function insert_id(){
		return mysqli_insert_id($this->cn);
	}

}
