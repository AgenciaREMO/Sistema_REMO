<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class My_Controller extends CI_Controller 
{
 	
 	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('portafolios/portafolio'); 
		$this->load->model('portafolios/portada');
		$this->load->model('portafolios/servicio');
		$this->load->model('portafolios/equipo');
		$this->load->model('portafolios/experiencia');
		$this->load->model('portafolios/grafico');
		$this->load->model('imagen'); 
		$this->load->library('pagination');
	}

	public function index()
	{

	}

	//Función que carga el formulario de portada
	public function cargar($id_portafolio){ //Recuperamos de la función de insertar el último id que fue inserdado.
	//$id = $this->uri->segment(3); 
	$id = array ('id_portafolio' => $id_portafolio);//Almacenamos en un arreglo el id que se obtuvo.
	$this->load->view("head", $id);
	$this->load->view("nav", $id);

/*

	$url= $_SERVER["REQUEST_URI"];
		if(strpos($url, "/portafolios/c_portada/")){
			$config['base_url'] = base_url().'portafolios/c_portada/cargar'.'/'.$id_portafolio;
			$config['total_rows'] = $this->portada->num_portadas(); //Número de filas que devuelve
			$config['per_page'] = 3; //Resultados por página
			$config['uri_segment'] = 5; //uri->id de la imagen
			$config['num_links'] = 5;
		}else{
			if(strpos($url, "/portafolios/c_equipo/")){
				$config['base_url'] = base_url().'portafolios/c_equipo/cargar'.'/'.$id_portafolio;
				$config['total_rows'] = $this->personal->num_equipo(); //Número de filas que devuelve
				$config['per_page'] = 5; //Resultados por página
				$config['uri_segment'] = 5; //uri->id de la imagen
				$config['num_links'] = 5; 
				Aqui faltaría agregar la páginación de imagenes de equipo
			}else{
				if(strpos($url, "/portafolios/c_experiencia/")){
					$config['base_url'] = base_url().'portafolios/c_experiencia/cargar'.'/'.$id_portafolio;
					$config['total_rows'] = $this->imagen->num_experiencia(); //Número de filas que devuelve
					$config['per_page'] = 5; //Resultados por página
					$config['uri_segment'] = 5; //uri->id de la imagen
					$config['num_links'] = 5;
				}else{
					if(strpos($url, "/portafolios/c_grafico/")){
						$config['base_url'] = base_url().'portafolios/c_grafico/cargar'.'/'.$id_portafolio;
						$config['total_rows'] = $this->imagen->num_grafico(); //Número de filas que devuelve
						$config['per_page'] = 5; //Resultados por página
						$config['uri_segment'] = 5; //uri->id de la imagen
						$config['num_links'] = 5;
					}
				}
			}
		} */

	//Sección de paginación
	$config['base_url'] = base_url().'portafolios/c_portada/cargar'.'/'.$id_portafolio;
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

	$experiencia['base_url'] = base_url().'portafolios/c_portada/cargar'.'/'.$id_portafolio;
	$experiencia['total_rows'] = $this->portada->num_portadas(); //Número de filas que devuelve
	$experiencia['per_page'] = 3; //Resultados por página
	$experiencia['uri_segment'] = 5; //uri->id de la imagen
	$experiencia['num_links'] = 5;
	//Aplicación de diseño con bootstrap!
	$experiencia['full_tag_open'] = '<ul class="pagination">';
	$experiencia['full_tag_close'] = '</ul>';
	$experiencia['first_link'] = false;
	$experiencia['last_link'] = false;
	$experiencia['first_tag_open'] = '<li>';
	$experiencia['first_tag_close'] = '</li>';
	$experiencia['prev_link'] = '&laquo';
	$experiencia['prev_tag_open'] = '<li class="prev">';
	$experiencia['prev_tag_close'] = '</li>';
	$experiencia['next_link'] = '&raquo';
	$experiencia['next_tag_open'] = '<li>';
	$experiencia['next_tag_close'] = '</li>';
	$experiencia['last_tag_open'] = '<li>';
	$experiencia['last_tag_close'] = '</li>';
	$experiencia['cur_tag_open'] = '<li class="active"><a href="#">';
	$experiencia['cur_tag_close'] = '</a></li>';
	$experiencia['num_tag_open'] = '<li>';
	$experiencia['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$this->pagination->initialize($experiencia);

		//$resultado = $this->imagen->mostrarImagen();
		$obtenerPortada= $this->portada->obtenerPortada($id);
		$disponiblePortada = $this->portada->obtener_pagina($config['per_page']);
		if($obtenerPortada != FALSE){
			foreach ($obtenerPortada->result() as $row) {$checkPortada = $row->id_img;}
			$paginationPortada = $this->pagination->create_links();
			$dataPortada= array('id_portafolio' => $id_portafolio,
								'disponiblePortada' => $disponiblePortada,
								'paginationPortada' => $paginationPortada,
								'checkPortada' => $checkPortada);
		}else{
			$id_portafolio = $id_portafolio;
			return FALSE;
		}
		$this->load->view("portafolios/form_portada", $dataPortada);


		$consultarServicio = $this->servicio->consultarServicios();
		$data = array('servicio' => $consultarServicio, 'id' => $id);
		$this->load->view("portafolios/form_servicio", $data);
		$this->load->view("portafolios/form_servicio", $id);

		$consulta = $this->equipo->mostrarPersonal(); 
		$mostrar = array('resultado' => $consulta,'id_portafolio' => $id_portafolio	); 
		$this->load->view("portafolios/form_equipo", $mostrar); 

		$obtenerExperiencia= $this->experiencia->obtenerExperiencia($id);
		$disponibleExperiencia = $this->experiencia->obtener_pagina($experiencia['per_page']);
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

		$this->load->view("portafolios/form_experiencia", $dataExperiencia);
		$this->load->view("portafolios/form_contenido", $id);
		$this->load->view("portafolios/form_general", $id);
		$this->load->view("footer", $id);
		}

}








/*Código por desechar*/

	

	//$consultar = $this->portada->consultarRegistro($id); 
	
	//$data = array();
	
	//$disponible =$this->portada->portadasDisponibles();
	
	//$anterior = $this->portada->portadaAnterior($id);
	//$check = $this->portada->checkDefault();
		
		/*foreach ($obtener->result() as $row) {
			$url_img = $row->url_img;
			$nom_img = $row->nom_img;
			$id_img = $row->id_img;
		}
		foreach ($consultar->result() as $row) {
			$id_img_checked = $row->id_img;
		}
		foreach ($check->result() as $row) {
			$id_img_checked_default = $row->id_img;
		}*/


							//'id_img' => $id_img,
					//'url_img' => $url_img,
					//'nom_img' => $nom_img,
					
					//'anterior' => $anterior,
					//'id_img_checked' => $id_img_checked,
					//'id_img_checked_default' => $id_img_checked_default,
					//'id_d' => $check->id_img,
					//'url_img_d' =>$check->url_thu,
					//'nom_img_d' =>$check->nom_img,
									
		
			//echo $id_img_checked;
			//echo $id_img_checked_default;
		