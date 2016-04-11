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
	//Función que permite mostrar en una vista los portafolios existentes.
	public function mostrarImagen()
	{
		/*
		//SELECT * FROM imagen
		*/
		return $this->db->get('imagen');
	}

	public function obtenerTipoImg(){
		/*
		//SELECT * FROM imagen
		*/
		return $this->db->get('tipo_imagen');
	}

	//Función que permite insertar una nueva imagen al sistema de base de datos.
	public function subir($nombre, $tipo, $url)
	{
		  $data = array(
            'nom_img' => $nombre,
            'id_tipo_img' => $tipo,
            'url_img' => $url
        );
        return $this->db->insert('imagen', $data);

	}
}