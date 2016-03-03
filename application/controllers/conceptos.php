<?php 
	/**
	* 
	*/
	class conceptos extends CI_Controller
	{


		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("conceptos/lista");
			$this->load->view("footer");
		}
	}
?> 