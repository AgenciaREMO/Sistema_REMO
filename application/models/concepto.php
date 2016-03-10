<?php 
	/**
	* 
	*/
	class Concepto extends CI_Model
	{	
		//CONCEPTOS	
		public function obtenerConceptos()
		{
			return $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto");
		}
		public function obtenerConcepto()
		{
			return $this->db->query("SELECT id_concepto, nombre FROM concepto");
		}
		public function agregarConcepto($data)
		{
			$this->db->insert('concepto',array('nombre' => $data['nombre'],'id_tipo' => $data['tipo']));
		}
		public function obtenerConceptoPorId($Id = '')
		{
			$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, id_concepto, concepto.id_tipo AS id_tipo FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo  WHERE id_concepto = '" . $Id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}

		//DESCRIPCIONES
		public function obtenerDescripcionPorId($Id = '')
		{
			$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE id_descripcion = '" . $Id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}

		//OTROS
		public function obtenerTipos()
		{
			return $this->db->query("SELECT id_tipo, nombre FROM tipo_proyecto");
		}
	}
?>