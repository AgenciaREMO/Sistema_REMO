<?php
	class Elemento extends CI_Model
	{
		public function obtenerElementos()
		{
			return $this->db->query("SELECT * FROM elemento_seccion ORDER BY seccion");
		}
		public function nuevoElemento($data)
		{
			$this->db->insert('elemento_seccion',array('seccion' => $data['seccion'],'descripcion' => $data['descripcion']));
			$id_insertado = $this->db->insert_id();
			return $id_insertado;
		}
		public function obtenerElementoPorId($id)
		{
			$resultado = $this->db->query("SELECT * FROM elemento_seccion WHERE id_elemento = '" . $id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}
		public function editarElemento($data)
		{
			$this->db->where('id_elemento', $data['id_elemento']);
			$this->db->update('elemento_seccion', array('descripcion' => $data['descripcion'], 'seccion' => $data['seccion']));
		}
		public function eliminarElemento($id)
		{
			$this->db->delete('elemento_seccion', array('id_elemento' => $id));
		}
	}
?> 