<?php 
	class Portafolios extends CI_Controller
	{
		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/lista");
			$this->load->view("footer");
		}


		public function nuevo(){
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/nuevo");
			$this->load->view("footer");
		}
	}	
?>