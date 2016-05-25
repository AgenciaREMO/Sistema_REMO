<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de la sección de portada de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 05 de Mayo del 2016
*/

	class C_portada extends CI_Controller
	{	
		//Constructor que carga helper, modelos, y librerías por default.
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('portafolios/portafolio'); 
			$this->load->model('portafolios/portada');
			$this->load->model('portafolios/servicio');
			$this->load->library('pagination');
		}
		//Función que carga el formulario como index
		public function index(){
			$this->cargar();
		}
		//Función que carga el formulario de portada
		public function cargar($id_portafolio){ //Recuperamos de la función de insertar el último id que fue inserdado.
			//$id = $this->uri->segment(3); 
			$id = array ('id_portafolio' => $id_portafolio);//Almacenamos en un arreglo el id que se obtuvo.
			$this->load->view("head", $id);
			$this->load->view("nav", $id);

			//Sección de paginación
			$config['base_url'] = base_url().'portafolios/c_portada/cargar'.'/'.$id_portafolio;
			$config['total_rows'] = $this->portada->num_portadas(); //Número de filas que devuelve
			$config['per_page'] = 1; //Resultados por página
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

			$id_img_checked = $this->portada->consultarRegistro($id); 
			$obtener= $this->portada->obtenerPortada($id);
			//$disponible =$this->portada->portadasDisponibles();
			$disponible = $this->portada->obtener_pagina($config['per_page']);
			//$anterior = $this->portada->portadaAnterior($id);
			$check = $this->portada->checkDefault();
				if($obtener != FALSE){
					/*foreach ($obtener->result() as $row) {
						$url_img = $row->url_img;
						$nom_img = $row->nom_img;
						$id_img = $row->id_img;
					}*/
					//foreach ($consultar->result() as $row) {
						//$id_img_checked = $row->id_img;
					//}

					$pagination = $this->pagination->create_links();
					$img= array(
						'id_portafolio' => $id_portafolio,
						//'id_img' => $id_img,
						//'url_img' => $url_img,
						//'nom_img' => $nom_img,
						'disponible' => $disponible,
						'pagination' => $pagination,
						//'anterior' => $anterior,
						'id_img_checked' => $id_img_checked,
						'id_img_checked_default' => $check,
						'id_d' => $check->id_img,
						//'url_img_d' =>$check->url_thu,
						//'nom_img_d' =>$check->nom_img,
									);
				}else{
					$id_portafolio = $id_portafolio;
					$url_img = '';
					$nom_img = '';
					$id_img = '';
					$url_img2 = '';
					$nom_img2 = '';
					return FALSE;
				}
			$this->load->view("portafolios/form_portada", $img);
			$consultarServicio = $this->servicio->consultarServicios();
			$data = array (
				'servicio' => $consultarServicio,
				'id' => $id
				);
			$this->load->view("portafolios/form_servicio", $data);
			$this->load->view("portafolios/form_servicio", $id);
			$this->load->view("portafolios/form_equipo", $id);
			$this->load->view("portafolios/form_experiencia", $id);
			$this->load->view("portafolios/form_general", $id);
			$this->load->view("footer", $id);
		}


		public function insertarPortada($id_portafolio){
			//Validación Radio button
			$this->form_validation->set_rules('id_img','portada','required');
			$this->form_validation->set_message('required', 'Debes seleccionar una  %s , es obligatorio');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->cargar($id_portafolio);
				echo 'fail';
			}else{
				
				$id_portafolio = $id_portafolio;
				$port_img = array(
					'id_portafolio' => $id_portafolio,
					'id_img' => $this->input->post('id_img')
					);//Almacenamos en un arreglo el id que se obtuvo.
				$this->portada->insertarPortada($port_img);
				print_r($port_img);
				redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
				echo 'successful';
			}
		}
	}