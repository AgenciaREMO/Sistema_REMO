<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de seccion de equipo de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 20 de junio del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Equipo extends CI_Model
{	
	//Función que permite mostrar el personal disponible para insertar en el portafolio.
	public function mostrarPersonal()
	{
		//SELECT * FROM personal
		return $this->db->get('personal');
	}

}