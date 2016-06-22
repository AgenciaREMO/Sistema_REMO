<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de experiencia de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 22 de Junio del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Experiencia extends CI_Model
{	
	//Función que permite consultar si existe un registro en la tabla portafolios-imagen para evaluar
	public function obtenerExperiencia($id){
		/*
		//SELECT * FROM portafolio_imagen WHERE id_portafolio = $id_portafolio
		Consulta que arroja datos de todas las imagenes de la tabla portafolio imagen que estan relacionadas con cierto portafolio
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $id['id_portafolio']);
		//$this->db->where('tipo_imagen.id_tipo_img', 3);
		$query = $this->db->get();
		if($query->num_rows()>0){
			/*SELECT
			//SELECT portafolio_imagen.id_por_ima, portafolio_imagen.id_portafolio, portafolio_imagen.id_img, imagen.nom_img, imagen.id_img, imagen.url_img, imagen.id_tipo_img, tipo_imagen.id_tipo_img 
			//FROM portafolio_imagen 
			//INNER JOIN imagen
			//ON portafolio_imagen.id_img = imagen.id_img
			//INNER JOIN tipo_imagen
			//ON imagen.id_tipo_img = tipo_imagen.id_tipo_img

			Esta consulta verifica que si existen registro estos coincidan con el tipo de gráfico experiencia
			*/
			$this->db->select('pi.id_por_ima, pi.id_portafolio, pi.id_img , i.id_img as id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img');
			$this->db->from('portafolio_imagen pi');
			$this->db->join('imagen i', 'pi.id_img = i.id_img');
			$this->db->join('tipo_imagen ti','i.id_tipo_img = ti.id_tipo_img');
			$this->db->where('i.id_tipo_img', 3);
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
			Y si no, realiza una consulta para obtener los id de las imagenes que estarán marcadas por default.
			*/
			$this->db->select('id_img');
			$this->db->from('imagen');
			$this->db->where('id_img', 3);//id de impagenes que van por default
			$this->db->where('id_tipo_img', 3); 
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

	//Paginación experiencia
	public function num_experiencia(){
		//SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 1
		$numero = $this->db->query("SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 3")->row()->number; //Regresa el número total de filas de una tabla
		return intval($numero);
	}

	public function obtener_pagina($numero_por_pagina){ //$numero_por_pagina viene del controlador
		//$this->db->get();
		$this->db->where('id_tipo_img', 3);
		$query = $this->db->get("imagen", $numero_por_pagina, $this->uri->segment(5));
		return $query;
	}

}