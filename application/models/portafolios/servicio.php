<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de seccion de serivio de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 04 Abril del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Servicio extends CI_Model
{

public function consultarServicio($id)
{
	/*	
	//SELECT * FROM portafolio_tipo RIGHT JOIN tipo_proyecto ON portafolio_tipo.id_tipo =tipo_proyecto.id_tipo AND portafolio_tipo.id_portafolio = $id['id_portafolio']
	*/
	$query= $this->db->query("SELECT portafolio_tipo.id_tipo as id_tipoP, 
							   		 portafolio_tipo.id_portafolio as id_porta, 
							         portafolio_tipo.desc_ser desc_ser, 
							   		 tipo_proyecto.id_tipo as id_tipoT , 
							         tipo_proyecto.nombre as nombre , 
							         tipo_proyecto.descripcion as descripcion 
					  FROM portafolio_tipo 
					  RIGHT JOIN tipo_proyecto 
					  ON portafolio_tipo.id_tipo =tipo_proyecto.id_tipo 
					  AND portafolio_tipo.id_portafolio = ".$id['id_portafolio']."");
	return $query;
}


	/*Función que permite consultar si existe un registro en la tabla portafolios-tipo para evaluar
	public function obtenerServicio($id){
		/*
		//SELECT * FROM portafolio_tipo INNER JOIN tipo_proyecto ON portafolio_tipo.id_tipo = tipo_proyecto.id_tipo	WHERE portafolio_tipo.id_portafolio = $id['id_portafolio']
		
		$this->db->select('*');
		$this->db->from('portafolio_tipo');
		$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo');
		$this->db->where('portafolio_tipo.id_portafolio', $id['id_portafolio']);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query;
			/*
			SELECT pt.id_portafolio, pt.id_tipo FROM portafolio_tipo pt INNER JOIN tipo_proyecto tp ON pt.id_tipo = tp.id_tipo WHERE pt.id_portafolio = $id['id_portafolio']
			
			$this->db->select('*');
			$this->db->from('portafolio_tipo');
			$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo','inner');
			$this->db->where('portafolio_tipo.id_portafolio', $id['id_portafolio']);
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Modificar';*
      	}else{
      		return false;
         	/*
			//$query = $this->db->query('select * from tipo_proyecto ORDER BY `id_tipo` ASC');
			
			$this->db->select('*');
			$this->db->from('portafolio_tipo');
			$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo', 'right');
			$query = $this->db->get();
				if($query->num_rows()>0){
					return $query;
				}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar';  *	
      	}

	}***/


	public function eliminarServicio($data){
		$this->db->where('id_portafolio', $data['id_portafolio']); 
   		$this->db->delete('portafolio_tipo');
	}

	public function insertarServicio($data, $descripcion, $tipo, $cont){
		$arrayCont = explode (", " , $cont['id_tipo']);
		for($i=0; $i <= count($arrayCont) ;$i++) {
			if(!empty($tipo['id_tipo'][$i])){
				$sql = " INSERT INTO portafolio_tipo (id_por_tip, id_tipo, id_portafolio, desc_ser) 
					     VALUES ('',".$tipo['id_tipo'][$i].",".$data['id_portafolio'].",'".$descripcion['descripcion'][$i]."')";
				echo $sql;
				echo '<br><br>';
				$this->db->query($sql);
				
			}else{
			}
		  
		  echo "<br><br>";   
		}
	}

	//Función que permite validar si existen registros en la base de datos donde este relacionado portafolio_tipo y tipo_proyecto 
	public function actualizarServicio($data, $descripcion, $tipo, $cont){
		//SELECT * FROM portafolio_tipo WHERE id_portafolio = $id['id_portafolio']
		$this->db->select('*');
		$this->db->from('portafolio_tipo');
		$this->db->where('id_portafolio', $data['id_portafolio']);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$this->eliminarServicio($data);
			$this->insertarServicio($data, $descripcion, $tipo, $cont);
		}else{ 
			$this->insertarServicio($data, $descripcion, $tipo, $cont);
		}
	}
}

?>