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
		