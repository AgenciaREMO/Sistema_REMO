<?php 
	class Portafolios extends CI_Controller
	{
		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolio/list");
			$this->load->view("footer");
		}
	}	
?>