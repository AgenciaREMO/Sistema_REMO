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
		//Funci´n para direccionar a formulario
	    public function index() 
	    {
	        //CARGAMOS LA VISTA DEL FORMULARIO
	   		//	Cargar demás vistas
	        $this->nueva();
	    }
	    //Función que permite validar el formulari
	    public function validar()
	    {
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
	            $this->subirGrafico();
	        }else{
	        //Si el formulario no se válida se muestran los errores
	            $this->nueva();
	        }
	    }
	    //Función que permite subir el gráfico
	    public function subirGrafico()
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
						$tipos = array('consulta' => $resultado,
									   'error' => $error);
						$this->load->view("imagenes/nueva_imagen", $tipos);
						$this->load->view("footer");
			        } else {
			        	//En otro caso se sube la imagen y se crea la miniatura 
			        	//Se obtiene todas las caracteristicas de la imagen en un arreglo
			            $file_info = $this->upload->data();
			            //Se usa la función thumbail y se usa el nombre de la imagen
			            $this->crearThumbnail($file_info['file_name'], $tipo);
			            //Se envían los datos al modelo para hacer la inserción
			            $data = array('upload_data' => $this->upload->data());
			            $nombre = $this->input->post('nombre');
			            $tipo_img = '1';
			            $url_img = 'graficos/portada/'.$file_info['file_name'];
			            $url_thu = 'graficos/portada/thumbnail/'.$file_info['file_name'];
			            $subir = $this->imagen->subir($nombre, $tipo_img, $url_img, $url_thu);  
			            //$this->load->view('imagen_subida_view', $data);
			            redirect('/c_imagenes/mostrar', 'refresh');
			        }
	        	break;
	        	case '2': 
	        		//Configuración para las imágenes
			        $config['upload_path'] = './graficos/equipo';
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
						$tipos = array('consulta' => $resultado,
									   'error' => $error);
						$this->load->view("imagenes/nueva_imagen", $tipos);
						$this->load->view("footer");
			        } else {
			        	//En otro caso se sube la imagen y se crea la miniatura 
			        	//Se obtiene todas las caracteristicas de la imagen en un arreglo
			            $file_info = $this->upload->data();
			            //Se usa la función thumbail y se usa el nombre de la imagen
			            $this->crearThumbnail($file_info['file_name'], $tipo);
			            //Se envían los datos al modelo para hacer la inserción
			            $data = array('upload_data' => $this->upload->data());
			            $nombre = $this->input->post('nombre');
			            $tipo_img = '2';
			            $url_img = 'graficos/equipo/'.$file_info['file_name'];
			            $url_thu = 'graficos/equipo/thumbnail/'.$file_info['file_name'];
			            $subir = $this->imagen->subir($nombre,$tipo_img, $url_img, $url_thu);  
			            //$this->load->view('imagen_subida_view', $data);
			            redirect('/c_imagenes/mostrar', 'refresh');
			        }
	        	break;
	        	case '3': 
	        		//Configuración para las imágenes
			        $config['upload_path'] = './graficos/experiencia';
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
						$tipos = array('consulta' => $resultado,
									   'error' => $error);
						$this->load->view("imagenes/nueva_imagen", $tipos);
						$this->load->view("footer");
			        } else {
			        	//En otro caso se sube la imagen y se crea la miniatura 
			        	//Se obtiene todas las caracteristicas de la imagen en un arreglo
			            $file_info = $this->upload->data();
			            //Se usa la función thumbail y se usa el nombre de la imagen
			            $this->crearThumbnail($file_info['file_name'], $tipo);
			            //Se envían los datos al modelo para hacer la inserción
			            $data = array('upload_data' => $this->upload->data());
			            $nombre = $this->input->post('nombre');
			            $tipo_img = '3';
			            $url_img = 'graficos/experiencia/'.$file_info['file_name'];
			            $url_thu = 'graficos/experiencia/thumbnail/'.$file_info['file_name'];
			            $subir = $this->imagen->subir($nombre,$tipo_img, $url_img, $url_thu);  
			            //$this->load->view('imagen_subida_view', $data);
			            redirect('/c_imagenes/mostrar', 'refresh');
			        }
	        	break;
	        	case '4': 
	        		//Configuración para las imágenes
			        $config['upload_path'] = './graficos/grafico';
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
						$tipos = array('consulta' => $resultado,
									   'error' => $error);
						$this->load->view("imagenes/nueva_imagen", $tipos);
						$this->load->view("footer");
			        } else {
			        	//En otro caso se sube la imagen y se crea la miniatura 
			        	//Se obtiene todas las caracteristicas de la imagen en un arreglo
			            $file_info = $this->upload->data();
			            //Se usa la función thumbail y se usa el nombre de la imagen
			            $this->crearThumbnail($file_info['file_name'], $tipo);
			            //Se envían los datos al modelo para hacer la inserción
			            $data = array('upload_data' => $this->upload->data());
			            $nombre = $this->input->post('nombre');
			            $tipo_img = '4';
			            $url_img = 'graficos/grafico/'.$file_info['file_name'];
			            $url_thu = 'graficos/grafico/thumbnail/'.$file_info['file_name'];
			            $subir = $this->imagen->subir($nombre,$tipo_img, $url_img, $url_thu);  
			            //$this->load->view('imagen_subida_view', $data);
			            redirect('/c_imagenes/mostrar', 'refresh');
			        }
	        	break;
	        	default:
	        	break;
	    	}
	    }
	    //Función para crear la miniatura a la medida especificada
	    public function crearThumbnail($filename, $tipo)
	    {
	    	/*
	  		//Inicio de Switch para elegir en que carpeta se almacenará el gráfico
	  		*/
	        switch ($tipo) {
	        	/*
	        	//Case para portada
	        	*/
	        	case '1':
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
	        	break;
	        	case '2':
	        		//Librería utilizada [GD, GD2, ImageMagick, NetPBM]
			        $config['image_library'] = 'gd2';
			        //Ruta de la imagen original
			        $config['source_image'] = 'graficos/equipo/'.$filename;
			        //Activación de la creación de miniaturas
			        $config['create_thumb'] = TRUE;
			        //Configuración para que mantenga la proporción
			        $config['maintain_ratio'] = TRUE;
			        //Ruta de la imagen miniatura
			        $config['new_image']='graficos/equipo/thumbnail/';
			        //Tamaño
			        $config['width'] = 150;
			        $config['height'] = 150;
			        //Reinicializamos los parametros de la librería
			        $this->load->library('image_lib', $config); 
			        //Creamos la miniatura
			        $this->image_lib->resize();
			        // finalmente limpiamos la cache para no saturar nuestro servidor
			        $this->image_lib->clear();
	        	break;
	        	case '3':
	        		//Librería utilizada [GD, GD2, ImageMagick, NetPBM]
			        $config['image_library'] = 'gd2';
			        //Ruta de la imagen original
			        $config['source_image'] = 'graficos/experiencia/'.$filename;
			        //Activación de la creación de miniaturas
			        $config['create_thumb'] = TRUE;
			        //Configuración para que mantenga la proporción
			        $config['maintain_ratio'] = TRUE;
			        //Ruta de la imagen miniatura
			        $config['new_image']='graficos/experiencia/thumbnail/';
			        //Tamaño
			        $config['width'] = 150;
			        $config['height'] = 150;
			        //Reinicializamos los parametros de la librería
			        $this->load->library('image_lib', $config); 
			        //Creamos la miniatura
			        $this->image_lib->resize();
			        // finalmente limpiamos la cache para no saturar nuestro servidor
			        $this->image_lib->clear();
	        	break;
	        	case '4':
	        		//Librería utilizada [GD, GD2, ImageMagick, NetPBM]
			        $config['image_library'] = 'gd2';
			        //Ruta de la imagen original
			        $config['source_image'] = 'graficos/grafico/'.$filename;
			        //Activación de la creación de miniaturas
			        $config['create_thumb'] = TRUE;
			        //Configuración para que mantenga la proporción
			        $config['maintain_ratio'] = TRUE;
			        //Ruta de la imagen miniatura
			        $config['new_image']='graficos/grafico/thumbnail/';
			        //Tamaño
			        $config['width'] = 150;
			        $config['height'] = 150;
			        //Reinicializamos los parametros de la librería
			        $this->load->library('image_lib', $config); 
			        //Creamos la miniatura
			        $this->image_lib->resize();
			        // finalmente limpiamos la cache para no saturar nuestro servidor
			        $this->image_lib->clear();
	        	break;

	        }
	    }
	    //Función que permite listas las imagenes disponibles
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
		//Función que carga la vista del formulario de nuevo grafico
		public function nueva()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$resultado = $this->imagen->obtenerTipoImg(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$tipos = array('resultado' => $resultado);
			$this->load->view("imagenes/nueva_imagen", $tipos);
			$this->load->view("footer");
		}	

		public function eliminar($id_img)
		{
			$this->imagen->eliminarImagen($id_img); //A la función del modelo se le pasa el arreglo del id
			redirect('/c_imagenes/mostrar'); 
		}

    }