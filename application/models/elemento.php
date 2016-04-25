<?php
	class Elemento extends CI_Model
	{
		public function obtenerElementos()
		{
			return $this->db->query("SELECT * FROM elemento_seccion JOIN tipo_seccion ON elemento_seccion.id_tipo_seccion=tipo_seccion.id_tipo_seccion ORDER BY seccion");
		}
		public function nuevoElemento($data)
		{
			$this->db->insert('elemento_seccion',array('id_tipo_seccion' => $data['seccion'],'descripcion' => $data['descripcion']));
			$id_insertado = $this->db->insert_id();
			return $id_insertado;
		}
		public function obtenerElementoPorId($id)
		{
			$resultado = $this->db->query("SELECT id_elemento,descripcion,seccion,elemento_seccion.id_tipo_seccion AS id_seccion FROM elemento_seccion JOIN tipo_seccion ON elemento_seccion.id_tipo_seccion=tipo_seccion.id_tipo_seccion WHERE id_elemento = '" . $id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}
		public function editarElemento($data)
		{
			$this->db->where('id_elemento', $data['id_elemento']);
			$this->db->update('elemento_seccion', array('descripcion' => $data['descripcion'], 'id_tipo_seccion' => $data['seccion']));
		}
		public function eliminarElemento($id)
		{
			$this->db->delete('elemento_seccion', array('id_elemento' => $id));
		}

		public function mostrarBusquedaElementos($busqueda, $tipo_bus)
		{
			if($tipo_bus=="b-elemento")
			{
				$resultado = $this->db->query("SELECT id_elemento,descripcion,seccion,elemento_seccion.id_tipo_seccion AS id_seccion FROM elemento_seccion JOIN tipo_seccion ON elemento_seccion.id_tipo_seccion=tipo_seccion.id_tipo_seccion WHERE descripcion LIKE '%".$busqueda."%' ORDER BY seccion");
			}
			else if($tipo_bus=="b-seccion")
			{
				$resultado = $this->db->query("SELECT id_elemento,descripcion,seccion,elemento_seccion.id_tipo_seccion AS id_seccion FROM elemento_seccion JOIN tipo_seccion ON elemento_seccion.id_tipo_seccion=tipo_seccion.id_tipo_seccion WHERE seccion LIKE '%".$busqueda."%' ORDER BY seccion");
			}
			
			return $resultado->result();
		}

		public function obtenerTiposSeccion()
		{
			return $this->db->query("SELECT id_tipo_seccion, seccion FROM tipo_seccion");
		}
	}
?> 