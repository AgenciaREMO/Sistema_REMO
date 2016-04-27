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
			$this->load->model('portafolios/portafolio'); //Cargamos el modelo que se usará en todo el controlador
			$this->load->model('portafolios/portada');
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
			$consultar = $this->portada->consultarRegistro($id);
			$obtener= $this->portada->obtenerPortada($id);
			$disponible = $this->portada->portadasDisponibles($id);
			$anterior = $this->portada->portadaAnterior($id);
			$check = $this->portada->checkDefault();
				if($obtener != FALSE){
					foreach ($obtener->result() as $row) {
						$url_img = $row->url_img;
						$nom_img = $row->nom_img;
						$id_img = $row->id_img;
					}
				
					$img= array(
						'id_portafolio' => $id_portafolio,
						'id_img' => $id_img,
						'url_img' => $url_img,
						'nom_img' => $nom_img,
						'disponible' => $disponible,
						'anterior' => $anterior,
						'consultar' => $consultar,
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
			$this->load->view("portafolios/form_servicio", $id);
			//$this->load->view("portafolios/form_comentario", $id);

			$this->load->view("portafolios/form_general", $id);
			$this->load->view("footer", $id);
		}
			
		public function insertarPortada(){
			$id_portafolio = $this->input->post->('id_portafolio');
			$id_img = $this->input->post('id_img');

			$port_img = array(
				'id_portafolio' => $id_portafolio,
				'id_img' => $id_img
				);

			$data = $this->portada->insertarPortada($port_img);
			echo json_encode($data);
		}

	}