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
			$data = array(
				'consulta' => $resultado
			);

			$this->load->view("elementos_seccion/listaElementos", $data);
			$this->load->view("footer");
		}
		public function elementoNuevo()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$resultado = $this->elemento->obtenerTiposSeccion();
			$data = array('consulta' => $resultado);

			$this->load->view("elementos_seccion/elemento_nuevo", $data);
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

			$resultado = $this->elemento->obtenerTiposSeccion();
			$fila = $this->elemento->obtenerElementoPorId($id);

			$data = array(
				'consulta' => $resultado,
				'id_elemento' => $fila->id_elemento,
				'seccion' => $fila->seccion,
				'id_seccion' => $fila->id_seccion,
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
			$this->elemento->eliminarElemento($id);
			redirect('elementos_seccion/listaElementosSeccion');
		}

		public function mostrarBusqueda()
		{
			if($this->input->is_ajax_request())
			{
				$buscar = $this->input->post("buscar");
				$tipo_bus = $this->input->post("tipo_busqueda");
				if ($tipo_bus == "b-seccion") {
					$datos = $this->elemento->mostrarBusquedaElementos($buscar, $tipo_bus);
				}
				else if ($tipo_bus == "b-elemento") {
					$datos = $this->elemento->mostrarBusquedaElementos($buscar, $tipo_bus);
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
