<?php
	class elementos_seccion extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('elemento');
			$this->load->helper('form');
		}
		public function listaElementosSeccion()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$resultado = $this->elemento->obtenerElementos();
			$data = array('consulta' => $resultado);

			$this->load->view("elementos_seccion/listaElementos", $data);
			$this->load->view("footer");
		}
		public function elementoNuevo()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$this->load->view("elementos_seccion/elemento_nuevo");
			$this->load->view("footer");
		}
		public function recibirDatosElemento()
		{
			$data = array(
				'seccion' => $this->input->post('seccion'),
				'descripcion' => $this->input->post('descripcion')
			);
			$id_insertado = $this->elemento->nuevoElemento($data);
			print_r($id_insertado);

			//redirect('conceptos/detallesDescripcion/'.$id_insertado);
		}
	}
?>