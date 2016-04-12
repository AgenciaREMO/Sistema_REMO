<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de contenido gráfico de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 16 de Marzo del 2016
//Fecha de modificación: 
*/

	class C_imagenes extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url')); //Cargamos helper de validación de formulario y base url
			$this->load->model('imagen'); //Cargamos el modelo que se usará en todo el controlador
		}

		public function index()
		{
			$this->load->view('imagenes/nueva_imagen');
		}

		public function tipo(){
			
		}

		public function subir($tipos = '')
		{	
			//Validación nombre
			$this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[5]|max_length[80]|trim|xss_clean');
        	$this->form_validation->set_message('required', 'El campo nombre no puede ir vacío!');
        	$this->form_validation->set_message('min_length', 'El campo nombre debe tener al menos 5 carácteres');
        	$this->form_validation->set_message('max_length', 'El campo nombre no puede tener más de 80 carácteres');
        	//Validación userfile

			
			if(!empty($_FILES['userfile']['name']) && $this->form_validation->run() == TRUE){	
	        	$tipo_img = $this->input->post('tipo');
	        	$nombre = $this->input->post('nombre');

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '2000';
				$config['max_width']  = '1980';
				$config['max_height']  = '1020';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('upload_form', $error);
				}
				else
				{   
					$file_info = $this->upload->data();
					
					$data = array('upload_data' => $this->upload->data()); //valores de las imagenes nombre, tipo, url, etc.
		            $url = $file_info['full_path'];
		            $subir = $this->imagen->subir($nombre, $tipo_img, $url);     
					$this->load->view('imagenes/upload_success', $data);
				}
			}else{
				$this->index();
			}
			
		}

		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			//$result1 = $this->imagen->mostrarImagen(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			//$mostrar = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			//$this->load->view("imagenes/lista_imagen", $mostrar); //A tráves de la variable data le mandamos el resultado a la vista
			$this->load->view("imagenes/lista_imagen");
			$this->load->view("footer");
		}

		public function nueva(){
			$this->load->view("head");
			$this->load->view("nav");
			$resultado = $this->imagen->obtenerTipoImg(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$tipos = array('consulta' => $resultado);
			$this->load->view("imagenes/nueva_imagen", $tipos);
			/*$resultado = $this->concepto->obtenerTipos();
			$data = array('consulta' => $resultado);
			$this->load->view("imagenes/nueva_imagen");*/
			$this->load->view("footer");
		}	

		/*public function insertar(){
			$inputs = array (
				'nombre' => $this->input->post('nombre', TRUE), //Se asigna a un arreglo el valor que obtiene de los input de nueva imagen
				'id_tipo_img' => $this->input->post('tipos',TRUE)
				); 
			$this->imagenes->insertarImagen($inputs); //Se le manda al método el valor que se obtuvo de los inputs
			redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función

		}*/

		/*public function prueba(){
			$this->load->view("head");
			$this->load->view("nav");
			
			$this->load->view("imagenes/upload_form"); //A tráves de la variable data le mandamos el resultado a la vista
			$this->load->view("footer");
		}*/

    }