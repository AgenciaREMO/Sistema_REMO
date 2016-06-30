<?php
/*
//Documento: Modelo del módulo comentario de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 09 de Marzo del 2016
//Fecha de modificación: 
*/
class Comentario extends CI_Model
{

	//Función que permite obtener campos de cierto id
	public function obtenerDatos($id){
		$this->db->from('portafolio');
      	$this->db->where('id_portafolio', $id['id_portafolio']);
      	$query = $this->db->get();
      	if($query->num_rows()>0){
        	return $query;
      	}else{
        	return FALSE;
      	}
	}

	//Función que permite insertar un nuevo comentario a base de datos.
	public function insertarComentario($inputsComentario)
	{	
		$this->db->where('id_portafolio', $inputsComentario['id_portafolio']); //Cuando se hace una comparación sacas la variable del arreglo de esta forma
		$this->db->update('portafolio', $inputsComentario);
		//$this->db->update('portafolio', array('nombre' => $inputsComentario['nombre'], 'comentario' => $inputsComentario['comentario'])); //Mandas modifique lo del arreglo
		return  $inputsComentario['id_portafolio'];//Recuperamos el id del último insert
	}




}