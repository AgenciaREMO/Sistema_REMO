<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de serivio de portafolios
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

public function consultarServicios()
{
	//	SELECT * FROM tipo_proyecto
	$this->db->select('*');
	$this->db->from('tipo_proyecto');
	$query = $this->db->get();
		if($query->num_rows()>0){
			return $query;
		}
}

}


?>