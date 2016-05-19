<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de portada de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 16 de Marzo del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Portada extends CI_Model
{	
	//Función que permite conocer si hay algun registro con portada para el id actual
	public function consultarRegistro($id){
		/*
		//SELECT *
		//FROM portafolio_imagen
		//INNER JOIN imagen
		//ON portafolio_imagen.id_img = imagen.id_img
		//INNER JOIN tipo_imagen
		//ON imagen.id_tipo_img = tipo_imagen.id_tipo_img
		//WHERE portafolio_imagen.id_portafolio =  $id['id_portafolio']
		//AND tipo_imagen.id_tipo_img = 1
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $id['id_portafolio']);
		$this->db->where('tipo_imagen.id_tipo_img', 1);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	//Función que permite consultar si existe un registro en la tabla portafolios-imagen para evaluar
	public function obtenerPortada($id){
		/*
		//SELECT * FROM portafolio_imagen WHERE id_portafolio = $id_portafolio
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $id['id_portafolio']);
		$this->db->where('tipo_imagen.id_tipo_img', 1);
		$query = $this->db->get();
		if($query->num_rows()>0){
			/*SELECT
			//SELECT portafolio_imagen.id_por_ima, portafolio_imagen.id_portafolio, portafolio_imagen.id_img, imagen.nom_img, imagen.id_img, imagen.url_img, imagen.id_tipo_img, tipo_imagen.id_tipo_img 
			//FROM portafolio_imagen 
			//INNER JOIN imagen
			//ON portafolio_imagen.id_img = imagen.id_img
			//INNER JOIN tipo_imagen
			//ON imagen.id_tipo_img = tipo_imagen.id_tipo_img
			*/
			$this->db->select('pi.id_por_ima, pi.id_portafolio, pi.id_img , i.id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img');
			$this->db->from('portafolio_imagen pi');
			$this->db->join('imagen i', 'pi.id_img = i.id_img');
			$this->db->join('tipo_imagen ti','i.id_tipo_img = ti.id_tipo_img');
			$this->db->where('i.id_tipo_img', 1);
			$this->db->where('pi.id_portafolio', $id['id_portafolio']);
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Modificar';
      	}else{
      	
         	/*
			//$query = $this->db->query('SELECT nom_img, url_img, url_thu FROM imagen WHERE id_img = 1 AND id_tipo_img = 1');
			*/
			$this->db->select('*');
			$this->db->from('imagen');
			$this->db->where('id_img', '1');
			$this->db->where('id_tipo_img', '1');
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar';    	
      	}

	}

	//Función que trae el id de la de default
	public function checkDefault(){
         	/*
			//$query = $this->db->query('SELECT nom_img, url_img, url_thu FROM imagen WHERE id_img = 1 AND id_tipo_img = 1');
			*/
			$this->db->select('*');
			$this->db->from('imagen');
			$this->db->where('id_img', '1');
			$this->db->where('id_tipo_img', '1');
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query->row();
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar'; 
	}

	//Función que permite obtener las portadas disponibles
	public function portadasDisponibles()
	{
			/*
			//$query = $this->db->query('SELECT nom_img, url_img, url_thu FROM imagen WHERE id_tipo_img = 1');
			*/
			$this->db->select('*');
			$this->db->from('imagen');
			$this->db->where('id_tipo_img', '1');
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	        	//return $query->row();
	      	}else{
	        	return false;
	      	}
	}

	/*
	public function portadaAnterior($id)
	{
		
			SELECT *
			FROM imagen
			INNER JOIN portafolio_imagen
			ON imagen.id_img = portafolio_imagen.id_img
			WHERE imagen.id_tipo_img = 1
			AND portafolio_imagen.id_portafolio != 12
			LIMIT 2
		
		$this->db->select('*');
		$this->db->from('imagen');
		$this->db->join('portafolio_imagen','imagen.id_img = portafolio_imagen.id_img');
		$this->db->where('imagen.id_tipo_img', 1);
		$this->db->where('portafolio_imagen.id_portafolio !=', $id['id_portafolio']);
		$this->db->limit(2);
		$query = $this->db->get();
		if($query->num_rows()>0){
        	return $query;
        	//return $query->row(); Devuelve valores en reglones en el controlador sería  data ['campo'] = $fila->campo
      	}else{
        	return false;
      	}
	}*/

	public function insertarPortada($port_img){
		$registro_p_i = $this->db->insert('portafolio_imagen', $port_img);
		return $registro_p_i;
	}

	public function actualizarPortada($id_portafolio, $id_img){
		$data=array(
			'id_portafolio' => $id_portafolio,
			'id_img' => $id_img
			);
		//$query = "UPDATE portafolio_imagen SET id_img = $id_img WHERE id_portafolio = $id_portafolio"
		$this->db->where('id_portafolio', $data['id_portafolio']);
		$this->db->update('portafolio_imagen', $data['$id_img']);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}

	}

	//Paginación
	public function num_portadas(){
		//SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 1
		$numero = $this->db->query("SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 1")->row()->number; //Regresa el número total de filas de una tabla
		return intval($numero);
	}

	public function obtener_pagina($numero_por_pagina){
		//$this->db->get();
		
		$query = $this->db->get("imagen", $numero_por_pagina, $this->uri->segment(5));
		//$this->db->where('id_tipo_img', 1);
		return $query;
	}

}

?>