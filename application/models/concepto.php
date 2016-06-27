<?php 
	/**
	* 
	*/
	class Concepto extends CI_Model
	{	
		//CONCEPTOS	
		public function obtenerConceptos()
		{
			return $this->db->query("SELECT tipo_proyecto.nombre AS tipo, 
										concepto.nombre AS concepto, 
										detalles, costo, id_descripcion, 
										concepto.id_concepto AS id_concepto 
										FROM tipo_proyecto 
										JOIN concepto 
										ON tipo_proyecto.id_tipo=concepto.id_tipo 
										JOIN descripcion 
										ON concepto.id_concepto=descripcion.id_concepto 
										ORDER BY concepto");
		}
		public function obtenerConcepto()
		{
			return $this->db->query("SELECT id_concepto, nombre FROM concepto");
		}
		public function nuevoConcepto($data)
		{
			$this->db->insert('concepto',array('nombre' => $data['nombre'],'id_tipo' => $data['tipo']));
			$id_insertado = $this->db->insert_id();
			return $id_insertado;
		}
		public function obtenerConceptoPorId($Id = '')
		{
			$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, 
											concepto.nombre AS concepto, 
											id_concepto, 
											concepto.id_tipo AS id_tipo 
											FROM tipo_proyecto 
											JOIN concepto 
											ON tipo_proyecto.id_tipo=concepto.id_tipo  
											WHERE id_concepto = '" . $Id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}
		public function obtenerConceptoPorNombreTipo($data)
		{
			$resultado = $this->db->query("SELECT * FROM concepto WHERE id_tipo = '". $data['tipo'] ."' AND nombre ='". $data['nombre'] ."'");
			return $resultado->row();
		}
		public function editarConcepto($data)
		{
			$this->db->where('id_concepto', $data['id_concepto']);
			$this->db->update('concepto', array('nombre' => $data['nombre'], 'id_tipo' => $data['tipo']));
		}
		public function eliminarConcepto($id)
		{
			$this->db->delete('concepto', array('id_concepto' => $id));
		}

		//DESCRIPCIONES
		public function obtenerDescripcionPorId($id = '', $tipo)
		{
			$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, 
											concepto.nombre AS concepto, 
											detalles, costo, id_descripcion, 
											concepto.id_concepto AS id_concepto 
											FROM tipo_proyecto 
											JOIN concepto 
											ON tipo_proyecto.id_tipo=concepto.id_tipo 
											JOIN descripcion 
											ON concepto.id_concepto=descripcion.id_concepto 
											WHERE id_descripcion = '" . $id . "' LIMIT 1");
			
			//Depende de si el resultado es para la sección de descripción o de conceptos es el tipo de return que se hace.
			if($tipo=="cotizacion")
			{
				return $resultado->result(); 
			}
			else if($tipo=="descripcion")
			{	
				return $resultado->row(); //Convierte el resultado de la consulta a una fila
			}
		}
		public function obtenerDescripcionesDeConcepto($id)
		{
			return $this->db->query("SELECT detalles FROM descripcion WHERE id_concepto = " . $id);
		}
		public function editarDescripcion($data)
		{
			$this->db->where('id_descripcion', $data['id_descripcion']);
			$this->db->update('descripcion', array('detalles' => $data['descripcion'], 'id_concepto' => $data['id_concepto'], 'costo' => $data['costo']));
		}
		public function eliminarDescripcion($id)
		{
			$this->db->delete('descripcion', array('id_descripcion' => $id));
		}
		public function nuevaDescripcion($data)
		{
			$this->db->insert('descripcion',array('id_concepto' => $data['id_concepto'],'detalles' => $data['detalles'],'costo' => $data['costo']));
			$id_insertado = $this->db->insert_id();
			return $id_insertado;
		}
		public function mostrarBusquedaDescripciones($busqueda, $tipo_bus, $costo1, $costo2)
		{
			if($tipo_bus=="b-concepto")
			{
				$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion, concepto.id_concepto AS id_concepto FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE concepto.nombre LIKE '%".$busqueda."%' ORDER BY concepto");
			}
			else if($tipo_bus=="b-descripcion")
			{
				$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion, concepto.id_concepto AS id_concepto FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE detalles LIKE '%".$busqueda."%' ORDER BY concepto");
			}
			else if($tipo_bus=="b-costoinf")
			{
				$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion, concepto.id_concepto AS id_concepto FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE costo >= ".$busqueda." ORDER BY concepto");
			}
			else if($tipo_bus=="b-costosup")
			{
				$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion, concepto.id_concepto AS id_concepto FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE costo <= ".$busqueda." ORDER BY concepto");
			}
			else if($tipo_bus=="b-costos")
			{
				$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion, concepto.id_concepto AS id_concepto FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE costo >= ".$costo1." AND costo <= ".$costo2." ORDER BY concepto");
			}
			else if($tipo_bus=="b-categoria")
			{
				$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, concepto.nombre AS concepto, detalles, costo, id_descripcion, concepto.id_concepto AS id_concepto FROM tipo_proyecto JOIN concepto ON tipo_proyecto.id_tipo=concepto.id_tipo JOIN descripcion ON concepto.id_concepto=descripcion.id_concepto WHERE tipo_proyecto.nombre LIKE '%".$busqueda."%' ORDER BY concepto");
			}
			
			return $resultado->result();
		}
		public function obtenerPaginacion($limit, $start)
		{
			$query = $this->db->query("SELECT * FROM descripcion LIMIT " . $start . ", " . $limit);
      		return $query->result();
		}


		//OTROS
		public function obtenerTipos()
		{
			return $this->db->query("SELECT id_tipo, nombre FROM tipo_proyecto");
		}

		//Paginación descripciones
		public function num_descripciones()
		{
			$numero = $this->db->query("SELECT count(*) as number
										FROM tipo_proyecto 
										JOIN concepto 
										ON tipo_proyecto.id_tipo=concepto.id_tipo 
										JOIN descripcion 
										ON concepto.id_concepto=descripcion.id_concepto")->row()->number; //Regresa el número total de filas de una tabla
			return intval($numero);
		}

		public function obtener_pagina($numero_por_pagina)
		{
			return $this->db->query("SELECT tipo_proyecto.nombre AS tipo, 
										concepto.nombre AS concepto, 
										detalles, costo, id_descripcion, 
										concepto.id_concepto AS id_concepto
										FROM tipo_proyecto 
										JOIN concepto 
										ON tipo_proyecto.id_tipo=concepto.id_tipo 
										JOIN descripcion 
										ON concepto.id_concepto=descripcion.id_concepto 
										ORDER BY concepto", $numero_por_pagina, $this->uri->segment(3));
		}
	}
?>