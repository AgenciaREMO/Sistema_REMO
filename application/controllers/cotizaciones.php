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

			$resultado = $this->cotizacion->obtenerCotizaciones();
			$data = array(
				'consulta' => $resultado
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