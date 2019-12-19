<?php 
/**
 * 
 */
class Localidades extends Model
{
	public function getTodas(){
		$this->db->query("SELECT l.id id_loc, l.nombre nom_loc, p.nombre nom_prov,a.nombre nom_ag, a.id_agencia id_ag 
						  FROM localidad l 
						  JOIN provincias p ON p.id_provincia=l.id_provincia 
						  JOIN agencias a ON a.id_agencia=l.id_agencia");
		return $this->db->fetchAll();
	}


	//se agrega esta funcion para devolver las localidades que sí tienen vendedores 
	public function getTodasHabilitadas(){
		$this->db->query("SELECT l.id id_loc, l.nombre nom_loc, p.nombre nom_prov,a.nombre nom_ag, a.id_agencia id_ag 
								FROM localidad l 
								JOIN provincias p ON p.id_provincia=l.id_provincia 
								JOIN agencias a ON a.id_agencia=l.id_agencia
								join usuarios u on u.id_agencia=a.id_agencia
								where u.id_rol=2
								group by nom_loc
                          		order by nom_prov");
		return $this->db->fetchAll();
	}

	public function getLocalidad($id_loc){
		$this->db->query("SELECT l.id id_loc, l.nombre as nom_loc, p.nombre nom_prov,a.nombre nom_ag, a.id_agencia id_ag 
						  FROM localidad l 
						  JOIN provincias p ON p.id_provincia=l.id_provincia 
						  JOIN agencias a ON a.id_agencia=l.id_agencia
						  WHERE l.id='". $id_loc. "'");

		return $this->db->fetchAll();
	}

	public function editarLocalidad($id_loc, $id_agencia){
		$this->db->query("UPDATE localidad
						  SET id_agencia ='$id_agencia'
						  WHERE id =".$id_loc);
	}	


}