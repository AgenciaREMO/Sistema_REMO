<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador del módulo de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/

	class C_portafolios extends CI_Controller
	{
		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->model('portafolios/portafolio'); //Cargamos Modelo de Lógica de los portafolios
			$result1 = $this->portafolio->mostrarPortafolio(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$data = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			$this->load->view("portafolios/lista_portafolio", $data); //A tráves de la variable data le mandamos el resultado a la vista
			$this->load->view("footer");
		}


		public function cargarFormulario(){
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/form_portada");
			$this->load->view("portafolios/form_servicio");
			$this->load->view("portafolios/form_equipo");
			$this->load->view("portafolios/form_experiencia");
			$this->load->view("portafolios/form_contenido");
			$this->load->view("portafolios/form_comentario");
			$this->load->view("portafolios/form_general");
			$this->load->view("footer");
		}

		public function guardarNuevo(){
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/nuevo_portafolio");
			$this->load->view("footer");
		}
	}	
?>