<?php 
	class Home extends CI_Controller
	{
		public function index()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("contenido");
			$this->load->view("footer");
		}
	}	
?>