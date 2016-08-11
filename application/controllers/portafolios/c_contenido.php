<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de sección contenido de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 30 de Junio del 2016
//Fecha de modificación: 
*/

/**
* 
*/
 class C_contenido extends MY_Controller
 {
 	//Función que permite cargar el formulario de la sección de contenido gráfico de portafolio.
 	public function cargarContenido($id_portafolio){
		$id = array('id_portafolio' => $id_portafolio);
		$this->load->view("head", $id);
		$this->load->view("nav", $id);
		$this->load->view("portafolios/port");
		//Sección de paginación
		$config['base_url'] = base_url().'portafolios/c_contenido/cargarContenido'.'/'.$id_portafolio;
		$config['total_rows'] = $this->grafico->num_contenido(); //Número de filas que devuelve
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

		$obtenerContenido= $this->grafico->obtenerContenido($id);

		$disponibleContenido = $this->grafico->obtener_pagina($config['per_page'], $id);

		if($obtenerContenido != FALSE){
			foreach ($obtenerContenido->result() as $row) {$checkContenido = $row->id_img;}
			$paginationContenido = $this->pagination->create_links();
			$dataContenido= array('id_portafolio' => $id_portafolio,
								'disponibleContenido' => $disponibleContenido,
								'paginationContenido' => $paginationContenido,
								'checkContenido' => $checkContenido);
		}else{
			$id_portafolio = $id_portafolio;
			return FALSE;
		}
		$this->load->view("portafolios/seccion_contenido", $dataContenido);
		$this->load->view("portafolios/form_general", $id);
		$this->load->view("footer", $id);
	}

		//Función que permite validar el formulario para insertar los servicios con cierto portafolio
	public function validarContenido($id_portafolio)
	{
		/*
		//Validaciones del formulario
		//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
		//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
		*/
		$this->form_validation->set_rules(
			'grafico[]', 
			'', 'required', array('¡Debes seleccionar al menos una opción!' )
		);

		//$this->form_validation->set_message('required', '¡Debes seleccionar al menos una opción!');
		//$this->form_validation->set_rules('descripcion[]', 'descripción', 'required|max_length[350]');
		//$this->form_validation->set_message('required', '¡El campo %s no puede ir vacío!');
		//$this->form_validation->set_message('max_length', '¡El campo %s no puede superar 350 caracteres!');
		//Si el formulario pasa la validación se procesa el siguiente método

		if ($this->form_validation->run() == FALSE) 
		{
			//Si el formulario no se válida se muestran los errores
	        $this->cargarContenido($id_portafolio);
	        echo 'fail cargar';
		}else
		{
			//Si es válido se realiza la función de insertar
		    $this->actualizarContenido($id_portafolio);
		    echo 'successful actualizar';
		}
	}


	public function actualizarContenido($id_portafolio){
		$id_portafolio = $id_portafolio;
		$data = array('id_portafolio' => $id_portafolio);
		$id_img = array('id_img' => $this->input->post('grafico'));
		$cont = array('id_img' => implode(", ", $this->input->post('grafico')));
		print_r($id_img);echo '<br><br>';
		print_r($cont);echo '<br><br>';
		print_r($data);echo '<br><br>';
	    $this->grafico->actualizarContenido($data, $id_img, $cont);
		//redirect('/portafolios/c_contenido/cargarContenido'.'/'.$id_portafolio); 
		
	}

 	
 } 
?>