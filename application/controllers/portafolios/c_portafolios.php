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
		function __construct()
		{
			parent::__construct();
			$this->load->model('portafolios/portafolio'); //Cargamos el modelo que se usará en todo el controlador
		}

		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$result1 = $this->portafolio->mostrarPortafolio(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$mostrar = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			$this->load->view("portafolios/lista_portafolio", $mostrar); //A tráves de la variable data le mandamos el resultado a la vista
			$this->load->view("footer");
		}


		public function cargarFormulario($id_portafolio){
			$cancelar = array ('consulta1' => $id_portafolio);
			$this->load->view("head", $cancelar);
			$this->load->view("nav", $cancelar);
			$this->load->view("portafolios/form_portada", $cancelar);
			$this->load->view("portafolios/form_servicio", $cancelar);
			$this->load->view("portafolios/form_equipo", $cancelar);
			$this->load->view("portafolios/form_experiencia", $cancelar);
			$this->load->view("portafolios/form_contenido", $cancelar);
			$this->load->view("portafolios/form_comentario", $cancelar);
			$this->portafolio->cancelarPortafolio($cancelar);
			$this->load->view("portafolios/form_general", $cancelar);
			$this->load->view("footer", $cancelar);
		}

		public function nuevo(){
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/nuevo_portafolio"); //Se asigna a la vista el valor que se obtuvo a traves del arreglo
			$this->load->view("footer");
		}	
			

		public function insertar(){
			
			$inputs = array (
				'nombre' => $this->input->post('nombre', TRUE) //Se asigna a un arreglo el valor que obtiene de los input de nuevo portafolio.
				); 
			$id_portafolio = $this->portafolio->insertarPortafolio($inputs); //Se le manda al método el valor que se obtuvo de los inputs
			redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función

		}

		public function cancelar(){
			$this->portafolio->cancelarPortafolio();
			//redirect('/portafolios/c_portafolios/mostrar'); //Redirecciona al mismo controlador pero a otra función
		}
	}	
?>