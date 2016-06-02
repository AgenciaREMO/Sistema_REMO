<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class My_controller_portafolio extends CI_Controller {
 
	public function index()
	{
		
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

			$this->pagination->initialize($config);

			//$consultar = $this->portada->consultarRegistro($id); 
			$resultado = $this->imagen->mostrarImagen();
			//$data = array();
			$obtener= $this->portada->obtenerPortada($id);
			//$disponible =$this->portada->portadasDisponibles();
			$disponible = $this->portada->obtener_pagina($config['per_page']);
			//$anterior = $this->portada->portadaAnterior($id);
			//$check = $this->portada->checkDefault();
				if($obtener != FALSE){
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
					foreach ($obtener->result() as $row) {
						$check = $row->id_img;
					}

					$pagination = $this->pagination->create_links();
					$img= array(
						'id_portafolio' => $id_portafolio,
						//'id_img' => $id_img,
						//'url_img' => $url_img,
						//'nom_img' => $nom_img,
						'disponible' => $disponible,
						'pagination' => $pagination,
						'check' => $check,
						'consulta' => $resultado 
						//'anterior' => $anterior,
						//'id_img_checked' => $id_img_checked,
						//'id_img_checked_default' => $id_img_checked_default,
						//'id_d' => $check->id_img,
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
				//echo $id_img_checked;
				//echo $id_img_checked_default;
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
}