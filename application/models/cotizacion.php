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
			return $this->db->query("SELECT tipo_proyecto.nombre AS tipo, 
										concepto.nombre AS concepto, 
										detalles, costo, id_descripcion, 
										concepto.id_concepto AS id_concepto 
										FROM tipo_proyecto 
										JOIN concepto 
										ON tipo_proyecto.id_tipo=concepto.id_tipo 
										JOIN descripcion 
										ON concepto.id_concepto=descripcion.id_concepto
										WHERE concepto.id_tipo = " . $tipo . " ORDER BY concepto");

		}
	}
?>