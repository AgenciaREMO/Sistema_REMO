<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de la sección de portada de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 05 de Mayo del 2016
*/

	class C_portada extends MY_Controller
	{	
		//Constructor que carga helper, modelos, y librerías por default.
		/*function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('portafolios/portafolio'); 
			$this->load->model('portafolios/portada');
			$this->load->model('portafolios/servicio');
			$this->load->model('imagen'); 
			$this->load->library('pagination');
		}*/
		//Función que carga el formulario como index
		public function index(){
			$this->cargar();
		}

		public function validarPortada($id_portafolio){
			/*
			//Validaciones del formulario
			//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
			//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
			*/
	        $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[5]|max_length[100]|trim|xss_clean');
	        $this->form_validation->set_message('required', 'El campo %s no puede ir vacío!');
	        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos %d carácteres');
	        $this->form_validation->set_message('max_length', 'El campo %s no puede tener más de %d carácteres');
	        $this->form_validation->set_rules('tipo', 'tipo', 'required|trim|xss_clean');
	        $this->form_validation->set_message('required', 'El campo %s no puede ir vacío!');
	        //Si el formulario pasa la validación se procesa el siguiente método
	        if ($this->form_validation->run() == TRUE) 
	        {
	            $this->subirPortada($id_portafolio);
	        }else{
	        //Si el formulario no se válida se muestran los errores
	            $this->cargar($id_portafolio); //Se modificará para que cargue los alert en el modal
	        }
		}

		public function subirPortada($id_portafolio){
			$id_portafolio = $id_portafolio;
			$tipo = $this->input->post('tipo');
			//Configuración para las imágenes
			$config['upload_path'] = './graficos/portada';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2000';
			$config['max_width'] = '2024';
			$config['max_height'] = '2008';
			//Cargamos la librería para subir imagenes "upload"
        	$this->load->library('upload', $config);
			//Si la imagen falla al subir se muestra el error en dislay 
			if (!$this->upload->do_upload()) {
			    $this->load->view("head");
				$this->load->view("nav");
				$resultado = $this->imagen->obtenerTipoImg(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
				$error = $this->upload->display_errors();
				$tipos = array('consulta' => $resultado,'error' => $error);
				$this->load->view('/portafolios/c_portada/cargar'.'/'.$id_portafolio, $tipos); //Aqui se tendrá que modificar
				$this->load->view("footer");
			} else {
			    //En otro caso se sube la imagen y se crea la miniatura 
			    //Se obtiene todas las caracteristicas de la imagen en un arreglo
			    $file_info = $this->upload->data();
			    //Se usa la función thumbail y se usa el nombre de la imagen
			    $this->crearThumbnailPortada($file_info['file_name'], $tipo);
			    //Se envían los datos al modelo para hacer la inserción
			    $data = array('upload_data' => $this->upload->data());
			    $nombre = $this->input->post('nombre');
			    $tipo_img = '1';
			    $url_img = 'graficos/portada/'.$file_info['file_name'];
			    $url_thu = 'graficos/portada/thumbnail/'.$file_info['file_name'];
			    $subir = $this->imagen->subir($nombre, $tipo_img, $url_img, $url_thu);  
			    //$this->load->view('imagen_subida_view', $data);
			    redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
			}
		}

		//Función para crear la miniatura a la medida especificada
	    public function crearThumbnailPortada($filename, $tipo)
	    {
	    	 //Librería utilizada [GD, GD2, ImageMagick, NetPBM]
			        $config['image_library'] = 'gd2';
			        //Ruta de la imagen original
			        $config['source_image'] = 'graficos/portada/'.$filename;
			        //Activación de la creación de miniaturas
			        $config['create_thumb'] = TRUE;
			        //Configuración para que mantenga la proporción
			        $config['maintain_ratio'] = TRUE;
			        //Ruta de la imagen miniatura
			        $config['new_image']='graficos/portada/thumbnail/';
			        //Tamaño
			        $config['width'] = 150;
			        $config['height'] = 150;
			        //Reinicializamos los parametros de la librería
			        $this->load->library('image_lib', $config); 
			        //Creamos la miniatura
			        $this->image_lib->resize();
			        // finalmente limpiamos la cache para no saturar nuestro servidor
			        $this->image_lib->clear();
	    }

		public function insertarPortada($id_portafolio)
		{
			//Validación Radio button
			$this->form_validation->set_rules('id_img','portada','required');
			$this->form_validation->set_message('required', 'Debes seleccionar una  %s , es obligatorio');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->cargar($id_portafolio);
				echo 'fail';
			}else{
				
				$id_portafolio = $id_portafolio;
				$port_img = array('id_portafolio' => $id_portafolio,'id_img' => implode(",",$this->input->post('id_img')));
				$this->portada->insertarPortada($port_img);
				print_r($port_img);
				redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
				echo 'successful';
			}
		}

		public function actualizarPortada($id_portafolio)     
        {   
           	//Validación Radio button
			$this->form_validation->set_rules('id_img','portada','required');
			$this->form_validation->set_message('required', 'Debes seleccionar una  %s , es obligatorio');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->cargar($id_portafolio);
				echo 'fail';
			}else{
				$id_portafolio = $id_portafolio;
				$port_img = array('id_portafolio' => $id_portafolio,'id_img' => $this->input->post('id_img'));
				$editarPortada = $this->portada->actualizarPortada($port_img);
				redirect('/portafolios/c_portada/cargarPortada'.'/'.$id_portafolio); 
			}         
    	}

    	public function cargarPortada($id_portafolio){
			$id = array ('id_portafolio' => $id_portafolio);
			$this->load->view("head", $id);
			$this->load->view("nav", $id);
			$this->load->view("portafolios/port");
			//Sección de paginación
			$config['base_url'] = base_url().'portafolios/c_portada/cargarPortada'.'/'.$id_portafolio;
			$config['total_rows'] = $this->portada->num_portadas(); //Número de filas que devuelve
			$config['per_page'] = 3; //Resultados por página
			$config['uri_segment'] = 5; //uri->id de la imagen
			$config['num_links'] = 5;
			//Aplicación de diseño con bootstrap!
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
			//Inicializamos la paginación de acuerdo al arreglo de config
			$this->pagination->initialize($config);
			//Muestra el total de portadas disponibles sin paginación
			//$resultado = $this->imagen->mostrarImagen();
			//Obtenemos ´las portadas disponibles para el portafolio
			$obtenerPortada= $this->portada->obtenerPortada($id);
			//Despliega las imagenes filtradas si son portadas, y de acuerdo a la configuración de la paginación
			$disponiblePortada = $this->portada->obtener_pagina($config['per_page']);
			//Se condiciona si existen registros de portadas envia la información
			if($obtenerPortada != FALSE){
				//Se hace la consulta si existen portadas relacionadas con el id actual y dependiendo de eso checked el radio
				foreach ($obtenerPortada->result() as $row) {$checkPortada = $row->id_img;}
				//Se crean los links de paginación para portada correspondientes
				$paginationPortada = $this->pagination->create_links();
				//Arreglo que envía "arreglos" a la vista para manejarlos.
				$dataPortada= array('id_portafolio' => $id_portafolio,
									'disponiblePortada' => $disponiblePortada,
									'paginationPortada' => $paginationPortada,
									'checkPortada' => $checkPortada);
			//Si no existe devuelte valores falsos
			}else{
				$id_portafolio = $id_portafolio;
				return FALSE;
			}
			$this->load->view("portafolios/seccion_portada", $dataPortada);
			$this->load->view("portafolios/form_general", $id);
			$this->load->view("footer", $id);
		}
	}