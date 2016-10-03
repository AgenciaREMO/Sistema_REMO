<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de sección experiencia de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 29 de Junio del 2016
//Fecha de modificación: 
*/

class C_experiencia extends MY_Controller
{
	public function cargarExperiencia($id_portafolio){
		$id = array('id_portafolio' => $id_portafolio);
		$this->load->view("head", $id);
		$this->load->view("nav", $id);
		$this->load->view("portafolios/bread-experiencia");
		$this->load->view("portafolios/port");
		//Sección de paginación
		$config['base_url'] = base_url().'portafolios/c_experiencia/cargarExperiencia'.'/'.$id_portafolio;
		$config['total_rows'] = $this->experiencia->num_experiencia(); //Número de filas que devuelve
		$config['per_page'] = 10; //Resultados por página
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

		$this->pagination->initialize($config);
		$obtener_pagina = $this->experiencia->obtener_pagina(/*$config['per_page'], $config['uri_segment'],*/ $id);
		$paginationExperiencia = $this->pagination->create_links();
		$dataExperiencia = array('id_portafolio' => $id_portafolio,
								 'obtener_pagina' => $obtener_pagina,
								 'paginationExperiencia' => $paginationExperiencia);
		$this->load->view("portafolios/seccion_experiencia", $dataExperiencia);
		$this->load->view("portafolios/form_general", $id);
		$this->load->view("footer", $id);
	}

	//Función que válida un formulario para subir un nuevo gráfico para experiencia
	public function validarExperiencia($id_portafolio){

		//Validaciones del formulario
		//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
		//$this->form_validation->set_message('regla de validación', 'mensaje personalizado');
	    $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[5]|max_length[100]|trim|xss_clean');
	    $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert"> El campo %s no puede ir vacío!</div>');
	    $this->form_validation->set_message('min_length', '<div class="alert alert-danger" role="alert"> El campo %s debe tener al menos %d carácteres</div>');
	    $this->form_validation->set_message('max_length', '<div class="alert alert-danger" role="alert"> El campo %s no puede tener más de %d carácteres</div>');
	    $this->form_validation->set_rules('tipo', 'tipo', 'required|trim|xss_clean');
	    $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert"> El campo %s no puede ir vacío!</div>');
	    //Si el formulario pasa la validación se procesa el siguiente método para subir el gráfico de experiencia
	    if ($this->form_validation->run() == TRUE) 
	    {
	        $this->subirExperiencia($id_portafolio);
	    }else{
	    //Si el formulario no se válida se muestran los errores del porque no se subieron
	        $this->cargarExperiencia($id_portafolio); //Se modificará para que cargue los alert en el modal
	    }
	}

	//Función que permite subir un gráfico para la sección de experiencia
	public function subirExperiencia($id_portafolio){
		$id_portafolio = $id_portafolio;
		$tipo = $this->input->post('tipo');
		//Configuración para las imágenes
		$nombre = $this->input->post('nombre');
		$config['file_name'] = $nombre;
		$config['upload_path'] = './graficos/experiencia';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2000';
		$config['max_width'] = '2024';
		$config['max_height'] = '2008';
		//Cargamos la librería para subir imagenes "upload"
        $this->load->library('upload', $config);
		//Si la imagen falla al subir se muestra el error en dislay 
		if(!$this->upload->do_upload()){
			$this->load->view("head");
			$this->load->view("nav");
			$resultado = $this->imagen->obtenerTipoImg();
			$error = $this->upload->display_errors();
			$tipos = array('consulta' => $resultado,'error' => $error);
			$this->load->view('/portafolios/c_experiencia/cargarExperiencia'.'/'.$id_portafolio, $tipos); //Aqui se tendrá que modificar
			$this->load->view("footer");
		}else{
			//En otro caso se sube la imagen y se crea la miniatura 
			//Se obtiene todas las caracteristicas de la imagen en un arreglo
			$file_info = $this->upload->data();
		    //Se usa la función thumbail y se usa el nombre de la imagen
			$this->crearThumbnailExperiencia($file_info['file_name'], $tipo);
			//Se envían los datos al modelo para hacer la inserción
			$data = array('upload_data' => $this->upload->data());
			$tipo_img = '3';
			$url_img = 'graficos/experiencia/'.$file_info['file_name'];
			$url_thu = 'graficos/experiencia/thumbnail/'.$file_info['file_name'];
			$subir = $this->imagen->subir($nombre, $tipo_img, $url_img, $url_thu);  
			//$this->load->view('imagen_subida_view', $data);
			redirect('/portafolios/c_experiencia/cargarExperiencia'.'/'.$id_portafolio); 
		}
	}
	//Función para crear la miniatura a la medida especificada
	public function crearThumbnailExperiencia($filename, $tipo)
	{
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
	}


	//Función que permite actualizar los registros existentes en relación con un portafolio, y en caso de no existir crea registros nuevos relacionados.
	public function actualizarExperiencia($id_portafolio)     
    {   
    	//Reglas de validación
    	$this->form_validation->set_rules(
			'experiencia[1][]', 
			'', 'required', array('¡Debes seleccionar al menos una opción!' )
		);
		/*
		$this->form_validation->set_rules(
			'resaltar[]', 
			'', 'required', array('¡Debes seleccionar al menos una opción!' )
		);
		$this->form_validation->set_rules(
			'incluir[]', 
			'', 'required', array('¡Debes seleccionar al menos una opción!' )
		);*/

		if ($this->form_validation->run() == FALSE) 
		{
			//Si el formulario no se válida se muestran los errores
	        $this->cargarExperiencia($id_portafolio);
	        echo 'fail cargar';
		}else
		{	
			//Si es válido se realiza la función de insertar
		    $id_portafolio = $id_portafolio;
			$data = array('id_portafolio' => $id_portafolio);
			$id_img = array('id_img' => $this->input->post('experiencia'));
			foreach ($this->input->post('experiencia') as $key => $value) {
				//print_r($key);
				foreach ($value as $key2 => $value2) {
					//$insert [$value2][] = $key; 
					if (!isset($insert2[$value2])) {
						$insert2 [$value2] = 0 ;
					}
					$insert2 [$value2] = ($insert2 [$value2] + $key); //valor sumado "binario"
				}
			}
			echo "</br>";
		    $this->experiencia->actualizarExperiencia($data, $insert2);
			//redirect('/portafolios/c_experiencia/cargarExperiencia'.'/'.$id_portafolio);
		    echo 'successful actualizar';
		}
	}      

}

