<?php 
	/**
	* 
	*/
	class conceptos extends CI_Controller
	{
		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$this->load->model('concepto');
			$resultado = $this->concepto->obtenerConcepto();
			$data = array('consulta' => $resultado);

			$this->load->view("conceptos/lista", $data);
			$this->load->view("footer");
		}
		public function detalles($id = '')
		{
			$this->concepto->obtenerDescripcionPorId($id);
		}
	}
?> 