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
		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$resultado = $this->concepto->obtenerConceptos();
			$data = array('consulta' => $resultado);

			$this->load->view("conceptos/lista", $data);
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
				'categoria' => $fila->tipo,
				'concepto' => $fila->concepto,
				'detalles' => $fila->detalles,
				'costo' => $fila->costo
			);
			$this->load->view("conceptos/editar_descripcion", $data);
			$this->load->view("footer");
		}
		public function editarDescripcion($id)
		{
			$fila = $this->concepto->obtenerDescripcionPorId($id);
			echo $fila->detalles;
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
		public function recibirDatos()
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'tipo' => $this->input->post('tipo')
			);
			$this->concepto->nuevoConcepto($data);
			$fila = $this->concepto->obtenerConceptoPorNombreTipo($data);
			$data = array(
				'id_concepto' => $fila->id_concepto,
				'detalles' => $this->input->post('descripcion'),
				'costo' => $this->input->post('costo')
			);
			$this->concepto->nuevaDescripcion($data);

			redirect('conceptos/detallesConcepto/'.$fila->id_concepto);
		}
		public function detallesConcepto($id = '')
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$resultado = $this->concepto->obtenerTipos();
			$data = array('consulta' => $resultado);
			$fila = $this->concepto->obtenerConceptoPorId($id);

			$data = array(
				'consulta' => $resultado,
				'id_concepto' => $fila->id_concepto,
				'concepto' => $fila->concepto,
				'id_tipo' => $fila->id_tipo,
				'tipo' => $fila->tipo
			);
			$this->load->view("conceptos/editar_concepto", $data);
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

			//redirect('conceptos/detallesConcepto/'.$fila->id_concepto);
		}
	}
?> 