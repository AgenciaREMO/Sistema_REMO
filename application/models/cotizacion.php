<?php 
	/**
	* 
	*/
	class Cotizacion extends CI_Model
	{
		public function obtenerCotizaciones()
		{
			return $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
											cotizacion.id_proyecto AS id_proyecto, 
											cotizacion.id_personal AS id_personal, 
											cotizacion.id_estatus AS id_estatus, 
											folio, f_expedicion, vigencia, total, 
											personal.nombre AS personal, 
											estatus_cotizacion.estatus AS estatus, 
											proyecto.nombre AS proyecto, 
											empresa.nombre AS empresa 
											FROM cotizacion 
											JOIN personal ON cotizacion.id_personal=personal.id_personal 
											JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
											JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
											JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
											JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
											ORDER BY vigencia DESC");
		}
		public function obtenerCotizacionPorId($Id = '')
		{
			$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
											cotizacion.id_proyecto AS id_proyecto, 
											cotizacion.id_personal AS id_personal, 
											cotizacion.id_estatus AS id_estatus, 
											folio, f_expedicion, vigencia, total, 
											personal.nombre AS personal, 
											estatus_cotizacion.estatus AS estatus, 
											proyecto.nombre AS proyecto, 
											empresa.nombre AS empresa 
											FROM cotizacion 
											JOIN personal ON cotizacion.id_personal=personal.id_personal 
											JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
											JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
											JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
											JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
											WHERE id_cotizacion='".$Id."' LIMIT 1");
			return $resultado->row(); 
		}
		public function obtenerCotizacionesTemp()
		{
			return $this->db->query("SELECT cotizacion_temp.id_cotizacion_temp AS id_cotizacion_temp, 
											cotizacion_temp.id_proyecto AS id_proyecto, 
											cotizacion_temp.id_personal AS id_personal,  
											folio, total, 
											personal.nombre AS personal, 
											proyecto.nombre AS proyecto, 
											empresa.nombre AS empresa 
											FROM cotizacion_temp 
											JOIN personal ON cotizacion_temp.id_personal=personal.id_personal 
											JOIN proyecto ON cotizacion_temp.id_proyecto=proyecto.id_proyecto 
											JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
											JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
											ORDER BY f_generacion DESC");
		}
		public function cotizacionesTotales()
		{
			$consulta = $this->db->query("SELECT * FROM cotizacion");
			$num_total = $consulta->num_rows();
			return $num_total;
			
		}
		public function cotizacionesAceptadas()
		{
			$consulta = $this->db->query("SELECT * FROM cotizacion WHERE id_estatus='1'");
			$num_aceptadas = $consulta->num_rows();
			return $num_aceptadas;
		}
		public function cotizacionesRevision()
		{
			$consulta = $this->db->query("SELECT * FROM cotizacion_temp");
			$num_revision = $consulta->num_rows();
			return $num_revision;
		}
		public function cotizacionesExpedidas()
		{
			$consulta = $this->db->query("SELECT * FROM cotizacion WHERE id_estatus='2'");
			$num_expedidas = $consulta->num_rows();
			return $num_expedidas;
		}
		public function cotizacionesRechazadas()
		{
			$consulta = $this->db->query("SELECT * FROM cotizacion WHERE id_estatus='3'");
			$num_rechazadas = $consulta->num_rows();
			return $num_rechazadas;
		}
		public function cotizacionesVencidas($fecha_actual)
		{
			$consulta = $this->db->query("SELECT * FROM cotizacion WHERE id_estatus=4");
			$num_vencidas = $consulta->num_rows();
			return $num_vencidas;
		}
		public function mostrarBusquedaCotizaciones($busqueda, $tipo_bus, $busqueda1, $busqueda2)
		{
			if($tipo_bus=="b-personal")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE personal.nombre LIKE '%".$busqueda."%' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-proyecto")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE proyecto.nombre LIKE '%".$busqueda."%' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-folio")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE folio LIKE '%".$busqueda."%' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-empresa")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE empresa.nombre LIKE '%".$busqueda."%' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-importeinf")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE total >='".$busqueda."' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-importesup")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE total <='".$busqueda."%' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-importes")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE total >= ".$busqueda1." AND total <= ".$busqueda2." ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-todos")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-expedicioninf")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE f_expedicion >='".$busqueda."' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-expedicionsup")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE f_expedicion <='".$busqueda."' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-expediciones")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE f_expedicion BETWEEN '".$busqueda1."' AND '".$busqueda2."' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-vigenciainf")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE vigencia >='".$busqueda."' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-vigenciasup")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE vigencia <='".$busqueda."' ORDER BY vigencia DESC");
			}
			else if($tipo_bus=="b-vigencias")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE vigencia BETWEEN '".$busqueda1."' AND '".$busqueda2."' ORDER BY vigencia DESC");
			}

			return $resultado->result();
		}
		public function mostrarFiltroCotizaciones($filtro)
		{
			if($filtro=="f-aceptada")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE cotizacion.id_estatus='1' ORDER BY vigencia DESC");
			}
			else if($filtro=="f-expedida")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE cotizacion.id_estatus='2' ORDER BY vigencia DESC");
			}
			else if($filtro=="f-rechazada")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE cotizacion.id_estatus='3' ORDER BY vigencia DESC");
			}
			else if($filtro=="f-revision")
			{
				$resultado = $this->db->query("SELECT cotizacion_temp.id_cotizacion_temp AS id_cotizacion, 
												cotizacion_temp.id_proyecto AS id_proyecto, 
												cotizacion_temp.id_personal AS id_personal, 
												folio, total, f_generacion,
												personal.nombre AS personal,
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion_temp 
												JOIN personal ON cotizacion_temp.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion_temp.id_proyecto=proyecto.id_proyecto  
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												ORDER BY f_generacion ASC");
			}
			else if($filtro=="f-vencida")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												WHERE cotizacion.id_estatus=4 ORDER BY vigencia DESC");
			}
			else if($filtro=="f-total")
			{
				$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												cotizacion.id_personal AS id_personal, 
												cotizacion.id_estatus AS id_estatus, 
												folio, f_expedicion, vigencia, total, 
												personal.nombre AS personal, 
												estatus_cotizacion.estatus AS estatus, 
												proyecto.nombre AS proyecto, 
												empresa.nombre AS empresa 
												FROM cotizacion 
												JOIN personal ON cotizacion.id_personal=personal.id_personal 
												JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto 
												JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus 
												JOIN cliente ON proyecto.id_cliente=cliente.id_cliente 
												JOIN empresa ON cliente.id_empresa=empresa.id_empresa 
												ORDER BY vigencia DESC");
			}
			return $resultado->result();
		}

		public function mostrarProyecto($id)
		{
			$resultado = $this->db->query("SELECT id_proyecto,
										proyecto.nombre AS nombre, 
										empresa.nombre AS empresa,
										cliente.nombre AS cliente,
										cliente.puesto AS puesto, 
										proyecto.id_tipo AS tipo  
										FROM proyecto 
										JOIN cliente ON proyecto.id_cliente=cliente.id_cliente
										JOIN empresa ON cliente.id_empresa=empresa.id_empresa
										WHERE id_proyecto = '" . $id . "' LIMIT 1");
			return $resultado->result();
		}

		public function obtenerElemento($elem)
		{
			return $this->db->query("SELECT * FROM elemento_seccion 
										JOIN tipo_seccion 
										ON elemento_seccion.id_tipo_seccion=tipo_seccion.id_tipo_seccion 
										WHERE tipo_seccion.id_tipo_seccion=".$elem);
		}
		public function obtenerElementosPorId($id)
		{
			return $this->db->query("SELECT * FROM elemento_seccion 
										JOIN elemento_cotizacion 
										ON elemento_seccion.id_elemento=elemento_cotizacion.id_elemento
										WHERE elemento_cotizacion.id_cotizacion_temp=".$id);
		}

		public function obtenerPersonal()
		{
			return $this->db->query("SELECT id_personal, nombre FROM personal");
		}
		public function obtenerProyectos()
		{
			return $this->db->query("SELECT id_proyecto, proyecto.nombre AS nombre, empresa.nombre AS empresa  
										FROM proyecto 
										JOIN cliente ON proyecto.id_cliente=cliente.id_cliente
										JOIN empresa ON cliente.id_empresa=empresa.id_empresa");
		}
		public function obtenerDescripcionesTipoProyecto($tipo)
		{
			$resultado = $this->db->query("SELECT tipo_proyecto.nombre AS tipo, 
										concepto.nombre AS concepto, 
										detalles, costo, id_descripcion, 
										concepto.id_concepto AS id_concepto,
										concepto.id_tipo AS id_tipo 
										FROM tipo_proyecto 
										JOIN concepto 
										ON tipo_proyecto.id_tipo=concepto.id_tipo 
										JOIN descripcion 
										ON concepto.id_concepto=descripcion.id_concepto
										WHERE concepto.id_tipo = " . $tipo . " ORDER BY concepto");
			return $resultado->result();

		}
		
		public function nuevaCotizacionTemp($data)
		{
			$this->db->insert('cotizacion_temp',array('id_proyecto' => $data['id_proyecto'],'id_personal' => $data['id_personal'],'f_generacion' => $data['f_generacion'],'cantidades' => $data['cantidades'],'descripciones' => $data['descripciones'],'horas' => $data['horas'],'comentario' => $data['comentario']));
			$id_insertado = $this->db->insert_id();
			//echo "id_proyecto=".$data['id_proyecto']." id_personal=".$data['id_personal']." f_generacion=".$data['f_generacion']." cantidades=".$data['cantidades']." descripciones=".$data['descripciones']." horas=".$data['horas']." comentario=".$data['comentario'];
			$elems = count($data['elementos']);
			for ($i=0; $i < $elems ; $i++) { 
				$this->db->insert('elemento_cotizacion',array('id_cotizacion_temp' => $id_insertado,'id_elemento' => $data['elementos'][$i]));
			}
			return $id_insertado;
		}
		public function obtenerTempPorId($Id)
		{
			$resultado = $this->db->query("SELECT cotizacion_temp.id_cotizacion_temp AS id_cotizacion_temp,
											cotizacion_temp.id_proyecto AS id_proyecto,
											cotizacion_temp.id_personal AS id_personal,
											cliente.nombre AS cliente,
											empresa.nombre AS empresa,
											proyecto.nombre AS proyecto,
											proyecto.id_tipo AS id_tipo,
											f_generacion, cantidades, descripciones, horas, comentario, puesto
											FROM cotizacion_temp 
											JOIN proyecto
											ON proyecto.id_proyecto = cotizacion_temp.id_proyecto
											JOIN cliente 
											ON cliente.id_cliente = proyecto.id_cliente
											JOIN empresa 
											ON cliente.id_empresa= empresa.id_empresa
											WHERE id_cotizacion_temp = '" . $Id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}
		public function editarTemp($data)
		{
			$this->db->delete('elemento_cotizacion', array('id_cotizacion_temp' => $data['id_temp']));

			$this->db->where('id_cotizacion_temp', $data['id_temp']);
			$this->db->update('cotizacion_temp', array('id_personal' => $data['id_personal'],'cantidades' => $data['cantidades'],'descripciones' => $data['descripciones'],'horas' => $data['horas'],'comentario' => $data['comentario']));

			$elems = count($data['elementos']);
			for ($i=0; $i < $elems ; $i++) { 
				$this->db->insert('elemento_cotizacion',array('id_cotizacion_temp' => $data['id_temp'],'id_elemento' => $data['elementos'][$i]));
			}
		}
		public function obtenerUltimoFolio()
		{
			return $this->db->query("SELECT MAX(id_cotizacion) + 1 AS id_cotizacion FROM cotizacion");
		}

		public function nuevaCotizacionFija($data)
		{
			//Crea la cotización fija
			$this->db->insert('cotizacion',array('id_proyecto' => $data['id_proyecto'],'id_personal' => $data['id_personal'],'id_estatus' => '2','folio' => $data['folio'],'f_expedicion' => $data['f_expedicion'],'f_generacion' => $data['f_generacion'],'vigencia' => $data['vigencia'],'total' => $data['total'],'comentario' => $data['comentario'],'url_cotizacion' => $data['url']));
			$id_insertado = $this->db->insert_id();

			//Elimina la cotización temporal y sus registros en elemento_cotizacion
			$this->db->delete('cotizacion_temp', array('id_cotizacion_temp' => $data['id_temp']));

			return $id_insertado;
		}		
		public function obtenerCotizPorId($id)
		{
			$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, 
												cotizacion.id_proyecto AS id_proyecto, 
												proyecto.nombre AS proyecto, 
												cotizacion.id_personal AS id_personal, 
												personal.nombre AS personal, 
												cliente.nombre AS cliente, 
												empresa.nombre AS empresa, 
												proyecto.nombre AS proyecto, 
												proyecto.id_tipo AS id_tipo, 
												tipo_proyecto.nombre AS tipo_proyecto,
												f_generacion, f_expedicion, estatus, folio, comentario, url_cotizacion
												FROM cotizacion 
												JOIN proyecto 
												ON proyecto.id_proyecto = cotizacion.id_proyecto 
												JOIN tipo_proyecto 
												ON tipo_proyecto.id_tipo = proyecto.id_tipo 
												JOIN cliente 
												ON cliente.id_cliente = proyecto.id_cliente 
												JOIN empresa 
												ON cliente.id_empresa = empresa.id_empresa 
												JOIN personal 
												ON personal.id_personal=cotizacion.id_personal 
												WHERE id_cotizacion = '" . $id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
		}
	}
?>