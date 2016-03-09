<?php 
/*
//Documento: Controlador del módulo de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/

	class Portafolios extends CI_Controller
	{
		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->model('portafolio'); //Cargamos Modelo de Lógica de los portafolios
			$result1 = $this->portafolio->mostrarPortafolio(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$data = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			$this->load->view("portafolios/lista", $data); //A tráves de la variable data le mandamos el resultado a la vista
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