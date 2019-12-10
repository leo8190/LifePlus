<?php

// models/Estados.php

class Estados extends Model
{
		public function verificarCambioEstado($estado_act,$estado_nuevo){

			if(!isset($estado_act)) die('error1 models estados');
			if(!is_numeric($estado_act)) die("error 2, models estados");
			if($estado_act< 1) die("error 3, models estados");	
			
			if(!isset($estado_act)) die('error4 models estados');
			if(!is_numeric($estado_nuevo)) die("error 5, models estados");
			if($estado_nuevo< 1) die("error 6, models estados");

			$this->existeEstado($estado_act);
			$this->existeEstado($estado_nuevo);

			$estados=$this->getCambiosPosibles($estado_act);

			if($estados==false)return false;
			$flag=0;
			foreach ($estados as $e) {
				if ($e['estado_permitido']==$estado_nuevo) {
					$flag=1;
				}
			}
			if ($flag==0) die("Error seguridad");
		}


		public function getCambiosPosibles($estado_act){

			if(!isset($estado_act)) die('error4 models estados');
			if(!is_numeric($estado_act)) die("error 7, tipo");
			if($estado_act< 1) die("error 8, rango");
			
			$this->existeEstado($estado_act);

			$this->db->query("SELECT c.estado_permitido,e.nombre
							 FROM cambios_estado c 
                             JOIN estados e ON e.id_estado=c.estado_permitido
							 WHERE c.estado_act=".$estado_act.";");

			if ($this->db->numRows()==0) return false;
			return $this->db->fetchAll();

		}


		public function getDisponiblesByRol($id_rol){
			$this->db->query("SELECT re.id_estado_permitido id_estado FROM rol_estprosp_permitidos re JOIN estados e ON e.id_estado= re.id_estado_permitido WHERE re.id_rol=". $id_rol . ";");
				return $this->db->fetch();
		}

		public function existeEstado($e){
			$this->db->query("SELECT e.id_estado FROM estados e WHERE e.id_estado=".$e." LIMIT 1;");
			// if($this->db->numRows()!=1) die("error seguridad");
			return true;
		}


		public function getTodos() { //para alguna función de reporte que necesite todos los estados
			$this->db->query("SELECT id_estado, nombre 
						  FROM estados");
			return $this->db->fetchAll();
		}

}