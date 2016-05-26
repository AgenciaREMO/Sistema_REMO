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
		$this->db->select('imagen.id_img as id_img');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $id['id_portafolio']);
		$this->db->where('tipo_imagen.id_tipo_img', 1);
		$id_img_checked = $this->db->get();
		if($id_img_checked->num_rows()>0){
			return $id_img_checked;
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
			$this->db->select('pi.id_por_ima, pi.id_portafolio, pi.id_img , i.id_img as id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img');
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
			$this->db->select('id_img');
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
			$this->db->select('id_img');
			$this->db->from('imagen');
			$this->db->where('id_img', '1');
			$this->db->where('id_tipo_img', '1');
			$id_img_checked_default = $this->db->get();
			if($id_img_checked_default->num_rows()>0){
	        	return $id_img_checked_default;
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
		//Comentar insert
		$registro_p_i = $this->db->insert('portafolio_imagen', $port_img);
	}

	public function editarPortada($port_img){
		//Comentar update
		$this->db->where('id_portafolio', $port_img['id_portafolio']);
		$this->db->update('portafolio_imagen', array('id_img' => $port_img['id_img']));
	}


	public function actualizarPortada($port_img){
		/*select *
		from portafolio_imagen
		inner join imagen
		on portafolio_imagen.id_img = imagen.id_img
		inner join tipo_imagen
		on imagen.id_tipo_img = tipo_imagen.id_tipo_img
		where tipo_imagen.id_tipo_img = 1 and portafolio_imagen.id_portafolio = 9
		*/
		//Consulta si existe un registro de un portafolio relacionado con una imagen tipo portada
		$this->db->select('portafolio_imagen.id_portafolio');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('tipo_imagen.id_tipo_img', 1);
		$this->db->where('portafolio_imagen.id_portafolio', $port_img['id_portafolio']);
		$query = $this->db->get();
		if($query->num_rows()>0){	//Si existe hace un update
			$this->editarPortada($port_img);
		}else{ //Si no existe hace un insert
			$this->insertarPortada($port_img);
		}
	}

	//Paginación portada
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