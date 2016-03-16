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


		public function cargarFormulario($id_portafolio){ //Recuperamos de la función de insertar el último id que fue inserdado.
			$id = array ('id_p' => $id_portafolio); //Almacenamos en un arreglo el id que se obtuvo.
			//$result1 = $this->portafolio->cancelarPortafolio($id_p); //Almacenamos en una variable el resultado de cancelar
			//if ($result1 == TRUE){
				//redirect('/portafolios/c_portafolios/mostrar'); //Redirecciona al mismo controlador pero a otra función
			//}else{
			$this->load->view("head", $id);
			$this->load->view("nav", $id);
			$this->load->view("portafolios/form_portada", $id);
			$this->load->view("portafolios/form_servicio", $id);
			$this->load->view("portafolios/form_equipo", $id);
			$this->load->view("portafolios/form_experiencia", $id);
			$this->load->view("portafolios/form_contenido", $id);
			$this->load->view("portafolios/form_comentario", $id);
			$this->load->view("portafolios/form_general", $id);
			$this->load->view("footer", $id);
			//}

			
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

		public function cancelar($id){
			$this->portafolio->cancelarPortafolio($id);
			redirect('/portafolios/c_portafolios/mostrar'); //Redirecciona al mismo controlador pero a otra función
		}
	}	
?>