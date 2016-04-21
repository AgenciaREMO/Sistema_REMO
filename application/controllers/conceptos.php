<?php 
	/**
	* 
	*/
	class conceptos extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('concepto');
			$this->load->helper('form');
		}
		public function listaDescripciones()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$buscar = $this->input->post("concepto");
			$resultado = $this->concepto->obtenerConceptos();
			$data = array('consulta' => $resultado);
			
			$this->load->library('pagination');
			$config['base_url'] = base_url().'/conceptos/listaDescripciones/';
			$config['total_rows'] = $this->db->count_all('descripcion');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['num_links'] = 2;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data['lista'] = $this->concepto->obtenerPaginacion($config["per_page"], $data['page']);
			
			$data['pagination'] = $this->pagination->create_links();



			$this->load->view("conceptos/listaDescripciones", $data);
			
			$this->load->view("footer");
		}
		public function detallesDescripcion($id = '')
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$fila = $this->concepto->obtenerDescripcionPorId($id);
			$resultado = $this->concepto->obtenerConcepto();

			$data = array(
				'consulta' => $resultado,
				'id_descripcion' => $fila->id_descripcion,
				'tipo' => $fila->tipo,
				'concepto' => $fila->concepto,
				'id_concepto' => $fila->id_concepto,
				'detalles' => $fila->detalles,
				'costo' => $fila->costo
			);
			$this->load->view("conceptos/editar_descripcion", $data);
			$this->load->view("footer");
		}
		public function detallesDescripcionAjax($id = '')
		{
			$data = $this->concepto->obtenerDescripcionPorId($id);

			echo json_encode($data);
		}
		public function descripcionNueva()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$resultado = $this->concepto->obtenerConcepto();
			$data = array('consulta' => $resultado);

			$this->load->view("conceptos/descripcion_nueva", $data);
			$this->load->view("footer");
		}
		public function editarDescripcion($id)
		{
			$data = array(
				'descripcion' => $this->input->post('descripcion'),
				'id_concepto' => $this->input->post('concepto'),
				'costo' => $this->input->post('costo'),
				'id_descripcion' => $id
			);
			$this->concepto->editarDescripcion($data);

			redirect('conceptos/detallesDescripcion/'.$id);
		}
		public function eliminarDescripcion($id)
		{
			$this->concepto->eliminarDescripcion($id);
			redirect('conceptos/listaDescripciones');
		}
		public function recibirDatosDescripcion()
		{
			$data = array(
				'id_concepto' => $this->input->post('concepto'),
				'detalles' => $this->input->post('descripcion'),
				'costo' => $this->input->post('costo')
			);
			$id_insertado = $this->concepto->nuevaDescripcion($data);

			redirect('conceptos/detallesDescripcion/'.$id_insertado);
		}


		public function recibirDatosConcepto()
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'tipo' => $this->input->post('tipo')
			);
			$id_insertado = $this->concepto->nuevoConcepto($data);
			$data = array(
				'id_concepto' => $id_insertado,
				'detalles' => $this->input->post('descripcion'),
				'costo' => $this->input->post('costo')
			);
			$this->concepto->nuevaDescripcion($data);

			redirect('conceptos/detallesConcepto/'.$id_insertado);
		}
		public function detallesConceptoAjax($id = '')
		{
			$data = $this->concepto->obtenerConceptoPorId($id);
			
			echo json_encode($data);
		}
		public function detallesConcepto($id = '')
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$resultado = $this->concepto->obtenerTipos();
			$fila = $this->concepto->obtenerConceptoPorId($id);
			$descripciones = $this->concepto->obtenerDescripcionesDeConcepto($id);
			$data = array(
				'consulta' => $resultado,
				'descripciones' => $descripciones,
				'id_concepto' => $fila->id_concepto,
				'concepto' => $fila->concepto,
				'id_tipo' => $fila->id_tipo,
				'tipo' => $fila->tipo
			);
			$this->load->view("conceptos/editar_concepto", $data);
			$this->load->view("footer");
		}
		public function conceptoNuevo()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$resultado = $this->concepto->obtenerTipos();
			$data = array('consulta' => $resultado);

			$this->load->view("conceptos/concepto_nuevo", $data);
			$this->load->view("footer");
		}
		public function editarConcepto($id)
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'tipo' => $this->input->post('tipo'),
				'id_concepto' => $id
			);
			$this->concepto->editarConcepto($data);

			redirect('conceptos/detallesConcepto/'.$id);
		}
		public function eliminarConcepto($id)
		{
			$this->concepto->eliminarConcepto($id);
			redirect('conceptos/listaDescripciones');
		}


		public function mostrarBusqueda()
		{
			if($this->input->is_ajax_request())
			{
				$buscar = $this->input->post("buscar");
				$tipo_bus = $this->input->post("tipo_busqueda");
				$costoinf = $this->input->post("costo_inf");
				$costosup = $this->input->post("costo_sup");
				if ($tipo_bus == "b-concepto") {
					$datos = $this->concepto->mostrarBusquedaDescripciones($buscar, $tipo_bus, $costoinf, $costosup);
				}
				else if ($tipo_bus == "b-descripcion") {
					$datos = $this->concepto->mostrarBusquedaDescripciones($buscar, $tipo_bus, $costoinf, $costosup);
				}
				else if ($tipo_bus == "b-costoinf") {
					$datos = $this->concepto->mostrarBusquedaDescripciones($buscar, $tipo_bus, $costoinf, $costosup);
				}
				else if ($tipo_bus == "b-costosup") {
					$datos = $this->concepto->mostrarBusquedaDescripciones($buscar, $tipo_bus, $costoinf, $costosup);
				}
				else if ($tipo_bus == "b-costos") {
					$datos = $this->concepto->mostrarBusquedaDescripciones($buscar, $tipo_bus, $costoinf, $costosup);
				}
				else if ($tipo_bus == "b-categoria") {
					$datos = $this->concepto->mostrarBusquedaDescripciones($buscar, $tipo_bus, $costoinf, $costosup);
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