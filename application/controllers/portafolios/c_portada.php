<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de la sección de portada de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/

	class C_portada extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('portafolios/portafolio'); //Cargamos el modelo que se usará en todo el controlador
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
/*
			$config['base_url'] = base_url().'portafolios/c_portada/cargar'.'/'.$id_portafolio;
			$config['total_rows'] = $this->portada->num_portadas(); //Número de filas que devuelve
			$config['per_page'] = 1; //Resultados por página
			$config['uri_segment'] = 5;
			$config['num_links'] = 5;
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

			//$consultar = $this->portada->consultarRegistro($id); 
			$obtener= $this->portada->obtenerPortada($id);
			$disponible =$this->portada->portadasDisponibles();
			//$disponible = $this->portada->obtener_pagina($config['per_page']);
			//$anterior = $this->portada->portadaAnterior($id);
			$check = $this->portada->checkDefault();
				if($obtener != FALSE){
					foreach ($obtener->result() as $row) {
						$url_img = $row->url_img;
						$nom_img = $row->nom_img;
						$id_img = $row->id_img;
					}
					//$pagination = $this->pagination->create_links();
					$img= array(
						'id_portafolio' => $id_portafolio,
						'id_img' => $id_img,
						'url_img' => $url_img,
						'nom_img' => $nom_img,
						'disponible' => $disponible,
						//'pagination' => $pagination,
						//'anterior' => $anterior,
						//'consultar' => $consultar,
						'id_d' => $check->id_img,
						'url_img_d' =>$check->url_thu,
						'nom_img_d' =>$check->nom_img,
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
		
		public function validar($id_portafolio){
			//Validación Radio button
			$this->form_validation->set_rules('id_img','portada','trim|required');
			$this->form_validation->set_message('required', 'Debes seleccionar una  %s , es obligatorio');
			if($this->form_validation->run()== FALSE) 
			{
				$this->insertarPortada($id_portafolio); //Si no paso la validación
			}else{
				$this->cargar($id_portafolio);
			}
		}

		public function insertarPortada($id_portafolio){
			$id_portafolio = $id_portafolio;
			$port_img = array(
				'id_portafolio' => $id_portafolio,
				'id_img' => $this->input->post('id_img')
				);//Almacenamos en un arreglo el id que se obtuvo.
			//$this->portada->insertarPortada($port_img);
			print_r($port_img);
			//redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
		}



		/*public function guardar($id_portafolio){
			$data = array ('id_portafolio' => $id_portafolio,
						 'id_img' => $this->input->post('id_img', TRUE)
						);//Almacenamos en un arreglo el id que se obtuvo.

			$this->portafolio->insertarPortada($data);
		}	*/

	/*public function actualizarSeleccion($id_portafolio){
			$id = array ('id_portafolio' => $id_portafolio);
			$boton === $_POST['boton'];
			if($boton === 'actualizarS'){
				$id_img = $this->input->post('id_img');
				if($this->actualizarPortada($id, $id_img)){
					echo "Actualizado";
				}else{
					echo "No actualizado";
				}
			}

		}*/
	}