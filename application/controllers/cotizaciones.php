<?php
	/**
	* 
	*/
	class cotizaciones extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('cotizacion');
			$this->load->helper('form');
		}
		public function listaCotizaciones()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$cotizaciones = $this->cotizacion->obtenerCotizaciones();
			$num_aceptadas = $this->cotizacion->cotizacionesAceptadas();
			$num_revision = $this->cotizacion->cotizacionesRevision();
			$num_expedidas = $this->cotizacion->cotizacionesExpedidas();
			$num_rechazadas = $this->cotizacion->cotizacionesRechazadas();
			$fecha_actual = date('Y-m-d');
			$num_vencidas= $this->cotizacion->cotizacionesVencidas($fecha_actual);
			$data = array(
				'consulta' => $cotizaciones,
				'num_aceptadas' => $num_aceptadas,
				'num_revision' => $num_revision,
				'num_expedidas' => $num_expedidas,
				'num_rechazadas' => $num_rechazadas,
				'num_vencidas' => $num_vencidas
			);

			$this->load->view("cotizaciones/listaCotizaciones", $data);
			$this->load->view("footer");
		} 
		public function detallesCotizacion($id = '')
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$fila = $this->cotizacion->obtenerCotizacionPorId($id);
			$data = array(
				'id_descripcion' => $fila->id_cotizacion
			);
			$this->load->view("cotizaciones/editar_cotizacion", $data);
			$this->load->view("footer");
		}
	}
?>