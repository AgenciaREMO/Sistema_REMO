<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de contenido gráfico de portafolios
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
	//Función que permite consultar si exist un registro en la tabla portafolios-imagen para evaluar
	public function obtenerPortada($id){
		/*
		//SELECT * FROM portafolio_imagen WHERE id_portafolio = $id_portafolio
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->where('id_portafolio', $id['id_portafolio']);
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
			$this->db->select('pi.id_por_ima, pi.id_portafolio, pi.id_img, i.id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img');
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
	/*Función que permite obtener la portada por default predeterminada
	public function portadaDefault()
	{
		*/
		//$query = $this->db->query('SELECT nom_img, url_img, url_thu FROM imagen WHERE id_img = 1 AND id_tipo_img = 1');
		/*
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
	}*/

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
        	//return $query;
        	return $query->row();
      	}else{
        	return false;
      	}
	}


	public function portadaAnterior($id)
	{
		/*
		//SELECT portafolio_imagen.id_por_ima, portafolio_imagen.id_img, imagen.nom_img, imagen.url_img, imagen.url_thu
		//FROM portafolio_imagen
		//INNER JOIN imagen
		//ON portafolio_imagen.id_img = imagen.id_img
		//INNER JOIN tipo_imagen
		//ON tipo_imagen.id_tipo_img = imagen.id_tipo_img
		//WHERE portafolio_imagen.id_por_ima != $ultimoID
		//LIMIT 2
		*/

		$this->db->select('pi.id_por_ima, pi.id_img, i.nom_img, i.url_img, i.url_thu');
		$this->db->from('portafolio_imagen pi');
		$this->db->join('imagen i','pi.id_img = i.id_img');
		$this->db->join('tipo_imagen ti', 'ti.id_tipo_img = i.id_tipo_img');
		$this->db->where('pi.id_portafolio !=', '$id');
		$this->db->limit(2);
		return $query = $this->db->get();
	}
}

?>