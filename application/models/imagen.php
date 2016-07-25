<?php
/*
//Documento: Modelo del módulo de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 09 de Marzo del 2016
//Fecha de modificación: 
*/
class Imagen extends CI_Model
{
	//Función que permite mostrar en una vista las imagenes existentes
	public function mostrarImagen()
	{
		/*
		SELECT 	i.id_img id_img, 
				i.nom_img nom_img, 
				i.url_img url_img, 
				i.id_tipo_img id_tipo_img1, 
				t.id_tipo_img id_tipo_img2, 
				t.nom_tipo nom_tipo
		FROM imagen i
		INNER JOIN tipo_imagen t
		ON t.id_tipo_img = i.id_tipo_img
		*/
		$this->db->select(
			'i.id_img id_img, 
			 i.nom_img nom_img, 
			 i.url_img url_img, 
			 i.id_tipo_img id_tipo_img1, 
			 t.id_tipo_img id_tipo_img2, 
			 t.nom_tipo nom_tipo'
			 );
		$this->db->from('imagen i');
		$this->db->join('tipo_imagen t', 't.id_tipo_img = i.id_tipo_img');
		return $query = $this->db->get();
	}

	public function obtenerTipoImg(){
		/*
		//SELECT * FROM imagen
		*/
		return $this->db->get('tipo_imagen');
	}

	//Función que permite insertar una nueva imagen al sistema de base de datos.
	public function subir($nombre,$tipo_img, $url_img, $url_thu)
	{
		/*
		//Arreglo que obtiene las variables para insertar
		*/
		  $data = array(
            'nom_img' => $nombre,
            'id_tipo_img' => $tipo_img,
            'url_img' => $url_img,
            'url_thu' => $url_thu
        );
        return $this->db->insert('imagen', $data);

	}

	//Paginación imagenes
	public function num_imagenes(){
		//SELECT 	i.id_img id_img, i.nom_img nom_img, i.url_img url_img, i.id_tipo_img id_tipo_img1, t.id_tipo_img id_tipo_img2, t.nom_tipo nom_tipo 
		//FROM imagen i
		//INNER JOIN tipo_imagen t
		//ON t.id_tipo_img = i.id_tipo_img
		//SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img 
		$numero = $this->db->query("SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img ")->row()->number; //Regresa el número total de filas de una tabla
		return intval($numero);
	}

	public function obtener_pagina($numero_por_pagina){
		//$this->db->get();
		$this->db->select(
			'i.id_img id_img, 
			 i.nom_img nom_img, 
			 i.url_img url_img, 
			 i.id_tipo_img id_tipo_img1, 
			 t.id_tipo_img id_tipo_img2, 
			 t.nom_tipo nom_tipo'
			 );
		$this->db->from('imagen i');
		$this->db->join('tipo_imagen t', 't.id_tipo_img = i.id_tipo_img');
		$query = $this->db->get("imagen", $numero_por_pagina, $this->uri->segment(3));
		return $query;
	}
}