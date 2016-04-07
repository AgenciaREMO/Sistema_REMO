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

			redirect('elementos_seccion/detallesElemento/'.$id_insertado);
		}
		public function detallesElemento($id)
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$fila = $this->elemento->obtenerElementoPorId($id);
			$data = array(
				'id_elemento' => $fila->id_elemento,
				'seccion' => $fila->seccion,
				'descripcion' => $fila->descripcion
			);
			$this->load->view("elementos_seccion/editar_elemento", $data);
			$this->load->view("footer");
		}
		public function editarElemento($id)
		{
			$data = array(
				'descripcion' => $this->input->post('descripcion'),
				'seccion' => $this->input->post('seccion'),
				'id_elemento' => $id
			);
			$this->elemento->editarElemento($data);

			redirect('elementos_seccion/detallesElemento/'.$id);
		}
		public function detallesElementoAjax($id = '')
		{
			$data = $this->elemento->obtenerElementoPorId($id);

			echo json_encode($data);
		}
		public function eliminarElemento($id)
		{
			print_r($id);
			$this->elemento->eliminarElemento($id);
			//redirect('elementos_seccion/listaElementosSeccion');
		}
	}
?>
