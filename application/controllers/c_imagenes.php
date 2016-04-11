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
			$this->load->view('imagenes/nueva_imagen', array('error' => ' ' ));
		}


		public function subir()
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1280';
			$config['max_height']  = '800';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('imagenes/nueva_imagen', $error);
			}
			else
			{   
				$file_info = $this->upload->data();
				
				$data = array('upload_data' => $this->upload->data()); //valores de las imagenes nombre, tipo, url, etc.
	            $nombre = $this->input->post('nombre');
	            $tipo = $this->input->post('tipo');
	            $url = $file_info['full_path'];
	            $subir = $this->imagen->subir($nombre,$tipo, $url);     
				$this->load->view('imagenes/upload_success', $data);
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