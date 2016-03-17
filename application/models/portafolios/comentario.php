<?php
/*
//Documento: Modelo del módulo de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 09 de Marzo del 2016
//Fecha de modificación: 
*/
class Comentario extends CI_Model
{

	//Función que permite insertar un nuevo comentario a base de datos.
	public function insertarComentario($inputs)
	{	
		$this->db->where('id_portafolio', $inputs['id_po']); //Cuando se hace una comparación sacas la variable del arreglo de esta forma
		$this->db->update('portafolio', $inputs); //Mandas modifique lo del arreglo
		return  $inputs['id_po']; //Recuperamos el id del último insert

	}


}