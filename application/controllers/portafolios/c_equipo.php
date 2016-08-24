<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de sección equipo de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 20 de junio del 2016
//Fecha de modificación: 
*/

/**
* 
*/
class C_equipo extends MY_Controller
{	
		//Función que permite cargar el formulario de equipo de trabajo de remo
		public function cargarEquipo($id_portafolio){
			$id = array('id_portafolio' => $id_portafolio);
			$this->load->view("head", $id);
			$this->load->view("nav", $id);
			$this->load->view("portafolios/port");

			/*Sección de paginación
			$config['base_url'] = base_url().'portafolios/c_equipo/cargarEquipo'.'/'.$id_portafolio;
			$config['total_rows'] = $this->equipo->num_equipo(); //Número de filas que devuelve
			$config['per_page'] = 10; //Resultados por página
			$config['uri_segment'] = 5; //uri->id de la imagen
			$config['num_links'] = 5;
			Aplicación de diseño con bootstrap!
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
			$this->pagination->initialize($config);*/
			$equipoDisponible = $this->equipo->equipoDisponible();
			$obtenerSlide = $this->equipo->obtenerSlide($id);
			$obtener_personal = $this->equipo->obtener_personal($id);
			//$paginationSlide = $this->pagination->create_links();
			/*$consulta = $this->equipo->mostrarPersonal(); */
			if($obtenerSlide != false){
				foreach ($obtenerSlide->result() as $row) {$checkSlide = $row->id_img;}
				$dataEquipo = array('obtener_personal'=> $obtener_personal,
				                'equipoDisponible' => $equipoDisponible,
				                'checkSlide' => $checkSlide,
				                //'paginationSlide' => $paginationSlide,
								'id_portafolio'=>$id_portafolio);
			}else{
				$id_portafolio = $id_portafolio;
				$checkSlide = '';
				
			}
			$this->load->view("portafolios/seccion_equipo", $dataEquipo);
			$this->load->view("portafolios/form_general", $id);
			$this->load->view("footer", $id);
		}

		public function validarEquipo($id_portafolio){
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
	            $this->subirEquipo($id_portafolio);
	        }else{
	        //Si el formulario no se válida se muestran los errores
	            $this->cargarEquipo($id_portafolio); //Se modificará para que cargue los alert en el modal
	        }
		}

		public function subirEquipo($id_portafolio){
			$id_portafolio = $id_portafolio;
			$tipo = $this->input->post('tipo');
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
				$tipos = array('consulta' => $resultado,'error' => $error);
				$this->load->view('/portafolios/c_equipo/cargarEquipo'.'/'.$id_portafolio, $tipos); //Aqui se tendrá que modificar
				$this->load->view("footer");
			} else {
			    //En otro caso se sube la imagen y se crea la miniatura 
			    //Se obtiene todas las caracteristicas de la imagen en un arreglo
			    $file_info = $this->upload->data();
			    //Se usa la función thumbail y se usa el nombre de la imagen
			    $this->crearThumbnailEquipo($file_info['file_name'], $tipo);
			    //Se envían los datos al modelo para hacer la inserción
			    $data = array('upload_data' => $this->upload->data());
			    $nombre = $this->input->post('nombre');
			    $tipo_img = '2';
			    $url_img = 'graficos/equipo/'.$file_info['file_name'];
			    $url_thu = 'graficos/equipo/thumbnail/'.$file_info['file_name'];
			    $subir = $this->imagen->subir($nombre, $tipo_img, $url_img, $url_thu);  
			    //$this->load->view('imagen_subida_view', $data);
			    redirect('/portafolios/c_equipo/cargarEquipo'.'/'.$id_portafolio); 
			}
		}

		//Función para crear la miniatura a la medida especificada
	    public function crearThumbnailEquipo($filename, $tipo)
	    {
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
	    }
	








}