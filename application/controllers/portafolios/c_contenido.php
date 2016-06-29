<?php

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
		$config['base_url'] = base_url().'portafolios/c_experiencia/cargarContenido'.'/'.$id_portafolio;
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

		$obtenerExperiencia= $this->experiencia->obtenerExperiencia($id);

		$disponibleExperiencia = $this->experiencia->obtener_pagina($config['per_page']);

		if($obtenerExperiencia != FALSE){
			foreach ($obtenerExperiencia->result() as $row) {$checkExperiencia = $row->id_img;}
			$paginationExperiencia = $this->pagination->create_links();
			$dataExperiencia= array('id_portafolio' => $id_portafolio,
								'disponibleExperiencia' => $disponibleExperiencia,
								'paginationExperiencia' => $paginationExperiencia,
								'checkExperiencia' => $checkExperiencia);
		}else{
			$id_portafolio = $id_portafolio;
			return FALSE;
		}
		$this->load->view("portafolios/seccion_experiencia", $dataExperiencia);
		$this->load->view("portafolios/form_general", $id);
		$this->load->view("footer", $id);
	}
 	
 } 
?>