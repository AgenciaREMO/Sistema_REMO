<?php
	class Elemento extends CI_Model
	{
		public function obtenerElementos()
		{
			return $this->db->query("SELECT * FROM elemento_seccion");
		}
		public function nuevoElemento($data)
		{
			$this->db->insert('elemento_seccion',array('seccion' => $data['seccion'],'descripcion' => $data['descripcion']));
			$id_insertado = $this->db->insert_id();
			return $id_insertado;
		}
	}
?>