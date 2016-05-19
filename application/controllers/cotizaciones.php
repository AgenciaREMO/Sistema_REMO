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

		public function mostrarBusqueda()
		{
			if($this->input->is_ajax_request())
			{
				$buscar = $this->input->post("buscar");
				$tipo_bus = $this->input->post("tipo_busqueda");
				$busquedainf = $this->input->post("busqueda_inf");
				$busquedasup = $this->input->post("busqueda_sup");
				if ($tipo_bus == "b-personal") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-proyecto") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-folio") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-empresa") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-importeinf") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-importesup") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-importes") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-todos") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-expedicioninf") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-expedicionsup") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-expediciones") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-vigenciainf") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-vigenciasup") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-vigencias") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}

				echo json_encode($datos);
			}
			else
			{
				show_404;
			}
		}
		public function mostrarFiltro()
		{
			if($this->input->is_ajax_request())
			{
				$filtro = $this->input->post("filtro");
				if ($filtro == "f-aceptada") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-expedida") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-rechazada") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}

				echo json_encode($datos);
			}
			else
			{
				show_404;
			}
		}
	}
?>