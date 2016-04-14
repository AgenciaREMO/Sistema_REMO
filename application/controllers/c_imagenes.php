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
	        $tipo = $this->input->post('tipo');
	  		/*
	  		//Inicio de Switch para elegir en que carpeta se almacenará el gráfico
	  		*/
	        switch ($tipo) {
	        	/*
	        	//Case para portada
	        	*/
	        	case '1': 
	        		$config['upload_path'] = './graficos/portada';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']	= '3000';
					//$config['max_width']  = '1980';
					//$config['max_height']  = '1020';

					$this->load->library('upload', $config);
					/*
					//Validaciones del formulario
					//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
					//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
					*/
					$this->form_validation->set_rules('nombre', 'Nombre de la Imagen', 'trim|required|min_length[10]|max_length[80]|is_unique[imagen.nom_img]');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de %d carácteres');
					$this->form_validation->set_message('max_length', 'El campo %s debe tener un maximo de %d carácteres');
					$this->form_validation->set_message('is_unique', 'Existe otro campo %s registrado con ese nombre');
					$this->form_validation->set_rules('tipo', 'Tipo de Imagen', 'trim|required');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					
					/*
					//Es la función encargada de verificar si existe un error en las validaciones del formulario.
					*/
					if ($this->form_validation->run() == FALSE)
					{
							    $this->nueva();   
					}
					else
					{
						if ( ! $this->upload->do_upload())
					    {
					        $error = $this->upload->display_errors();
					        $this->load->view('imagenes/nueva_imagen', $error);
					    }
						else{
							$file_info = $this->upload->data(); //Arreglo que tiene toda la información de la imagen.
							
							$data = array('upload_data' => $this->upload->data()); //valores de las imagenes nombre, tipo, url, etc.
				            $nombre = $this->input->post('nombre');
				            $tipo_img = '1';
				            $url = $file_info['full_path'];
				            $subir = $this->imagen->subir($nombre, $tipo_img, $url);     
							//$this->load->view('imagenes/upload_success', $data);

							if($subir)
							       {
							          redirect('/c_imagenes/mostrar', 'refresh');
							       }
							       else
							       {
							          $this->nueva();
							       }
						}
					}
	        	break;
	        	//Case para equipo
	        	case '2': 
	        		$config['upload_path'] = './graficos/equipo';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']	= '3000';
					//$config['max_width']  = '1980';
					//$config['max_height']  = '1020';

					$this->load->library('upload', $config);
					/*
					//Validaciones del formulario
					//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
					//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
					*/
					$this->form_validation->set_rules('nombre', 'Nombre de la Imagen', 'trim|required|min_length[10]|max_length[80]|is_unique[imagen.nom_img]');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de %d carácteres');
					$this->form_validation->set_message('max_length', 'El campo %s debe tener un maximo de %d carácteres');
					$this->form_validation->set_message('is_unique', 'Existe otro campo %s registrado con ese nombre');
					$this->form_validation->set_rules('tipo', 'Tipo de Imagen', 'trim|required');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					
					/*
					//Es la función encargada de verificar si existe un error en las validaciones del formulario.
					*/
					if ($this->form_validation->run() == FALSE)
					{
							    $this->nueva();   
					}
					else
					{
						if ( ! $this->upload->do_upload())
					    {
					        $error = $this->upload->display_errors();
					        $this->load->view('imagenes/nueva_imagen', $error);
					    }
						else{
							$file_info = $this->upload->data(); //Arreglo que tiene toda la información de la imagen.
							
							$data = array('upload_data' => $this->upload->data()); //valores de las imagenes nombre, tipo, url, etc.
				            $nombre = $this->input->post('nombre');
				            $tipo_img = '2';
				            $url = $file_info['full_path'];
				            $subir = $this->imagen->subir($nombre, $tipo_img, $url);     
							//$this->load->view('imagenes/upload_success', $data);

							if($subir)
							       {
							          redirect('/c_imagenes/mostrar', 'refresh');
							       }
							       else
							       {
							          $this->nueva();
							       }
						}
					}
	        	break;
	        	//Case para experiencia
	        	case '3': 
	        		$config['upload_path'] = './graficos/experiencia';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']	= '3000';
					//$config['max_width']  = '1980';
					//$config['max_height']  = '1020';

					$this->load->library('upload', $config);
					/*
					//Validaciones del formulario
					//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
					//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
					*/
					$this->form_validation->set_rules('nombre', 'Nombre de la Imagen', 'trim|required|min_length[10]|max_length[80]|is_unique[imagen.nom_img]');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de %d carácteres');
					$this->form_validation->set_message('max_length', 'El campo %s debe tener un maximo de %d carácteres');
					$this->form_validation->set_message('is_unique', 'Existe otro campo %s registrado con ese nombre');
					$this->form_validation->set_rules('tipo', 'Tipo de Imagen', 'trim|required');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					
					/*
					//Es la función encargada de verificar si existe un error en las validaciones del formulario.
					*/
					if ($this->form_validation->run() == FALSE)
					{
							    $this->nueva();   
					}
					else
					{
						if ( ! $this->upload->do_upload())
					    {
					        $error = $this->upload->display_errors();
					        $this->load->view('imagenes/nueva_imagen', $error);
					    }
						else{
							$file_info = $this->upload->data(); //Arreglo que tiene toda la información de la imagen.
							
							$data = array('upload_data' => $this->upload->data()); //valores de las imagenes nombre, tipo, url, etc.
				            $nombre = $this->input->post('nombre');
				            $tipo_img = '3';
				            $url = $file_info['full_path'];
				            $subir = $this->imagen->subir($nombre, $tipo_img, $url);     
							//$this->load->view('imagenes/upload_success', $data);

							if($subir)
							       {
							          redirect('/c_imagenes/mostrar', 'refresh');
							       }
							       else
							       {
							          $this->nueva();
							       }
						}
					}
	        	break;
	        	//Case para gráfico
	        	case '4': 
	        		$config['upload_path'] = './graficos/grafico';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']	= '3000';
					//$config['max_width']  = '1980';
					//$config['max_height']  = '1020';

					$this->load->library('upload', $config);
					/*
					//Validaciones del formulario
					//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
					//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
					*/
					$this->form_validation->set_rules('nombre', 'Nombre de la Imagen', 'trim|required|min_length[10]|max_length[80]|is_unique[imagen.nom_img]');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de %d carácteres');
					$this->form_validation->set_message('max_length', 'El campo %s debe tener un maximo de %d carácteres');
					$this->form_validation->set_message('is_unique', 'Existe otro campo %s registrado con ese nombre');
					$this->form_validation->set_rules('tipo', 'Tipo de Imagen', 'trim|required');
					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
					
					/*
					//Es la función encargada de verificar si existe un error en las validaciones del formulario.
					*/
					if ($this->form_validation->run() == FALSE)
					{
							    $this->nueva();   
					}
					else
					{
						if ( ! $this->upload->do_upload())
					    {
					        $error = $this->upload->display_errors();
					        $this->load->view('imagenes/nueva_imagen', $error);
					    }
						else{
							$file_info = $this->upload->data(); //Arreglo que tiene toda la información de la imagen.
							
							$data = array('upload_data' => $this->upload->data()); //valores de las imagenes nombre, tipo, url, etc.
				            $nombre = $this->input->post('nombre');
				            $tipo_img = '4';
				            $url = $file_info['full_path'];
				            $subir = $this->imagen->subir($nombre, $tipo_img, $url);     
							//$this->load->view('imagenes/upload_success', $data);

							if($subir)
							       {
							          redirect('/c_imagenes/mostrar', 'refresh');
							       }
							       else
							       {
							          $this->nueva();
							       }
						}
					}
	        	break;
	        	default:
				break;
				}
		}

		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			//$result1 = $this->imagen->mostrarImagen(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			//$mostrar = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			$resultado = $this->imagen->mostrarImagen();
			$data = array('consulta' => $resultado );
			//$data['imagen'] = $this->imagen->mostrarImagen();
			$this->load->view("imagenes/lista_imagen", $data); //A tráves de la variable data le mandamos el resultado a la vista
			//$this->load->view("imagenes/lista_imagen");
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

		public function eliminar($id_img){
			$this->imagen->eliminarImagen($id_img); //A la función del modelo se le pasa el arreglo del id
			redirect('/c_imagenes/mostrar'); 
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