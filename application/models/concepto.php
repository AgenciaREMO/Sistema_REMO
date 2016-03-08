<?php 
	/**
	* 
	*/
	class Concepto extends CI_Model
	{		
		public function obtenerConcepto()
		{
			return $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto");
		}
		public function obtenerDescripcionPorId($id = '')
		{
			$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE id_descripcion='" . $id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}
	}
?>