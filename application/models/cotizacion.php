<?php 
	/**
	* 
	*/
	class Cotizacion extends CI_Model
	{
		public function obtenerCotizaciones()
		{
			return $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, cotizacion.id_proyecto AS id_proyecto, cotizacion.id_personal AS id_personal, cotizacion.id_estatus AS id_estatus, folio, f_expedicion, vigencia, total, personal.nombre AS personal, estatus_cotizacion.estatus AS estatus, proyecto.nombre AS proyecto, empresa.nombre AS empresa FROM cotizacion JOIN personal ON cotizacion.id_personal=personal.id_personal JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus JOIN cliente ON proyecto.id_cliente=cliente.id_cliente JOIN empresa ON cliente.id_empresa=empresa.id_empresa ORDER BY vigencia DESC");
		}
		public function obtenerCotizacionPorId($Id = '')
		{
			$resultado = $this->db->query("SELECT cotizacion.id_cotizacion AS id_cotizacion, cotizacion.id_proyecto AS id_proyecto, cotizacion.id_personal AS id_personal, cotizacion.id_estatus AS id_estatus, folio, f_expedicion, vigencia, total, personal.nombre AS personal, estatus_cotizacion.estatus AS estatus, proyecto.nombre AS proyecto, empresa.nombre AS empresa FROM cotizacion JOIN personal ON cotizacion.id_personal=personal.id_personal JOIN proyecto ON cotizacion.id_proyecto=proyecto.id_proyecto JOIN estatus_cotizacion ON cotizacion.id_estatus=estatus_cotizacion.id_estatus JOIN cliente ON proyecto.id_cliente=cliente.id_cliente JOIN empresa ON cliente.id_empresa=empresa.id_empresa WHERE id_cotizacion='".$Id."' LIMIT 1");
			return $resultado->row(); 
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
			$consulta = $this->db->query("SELECT * FROM cotizacion WHERE vigencia < '".$fecha_actual."'");
			$num_vencidas = $consulta->num_rows();
			return $num_vencidas;
		}
	}
?>