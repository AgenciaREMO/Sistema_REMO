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
			$this->load->model('portafolios/comentario'); //Cargamos el modelo que se usará en todo el controlador
		}
		/*
		//Funciones de Portafolio en general
		*/

		//Función que permite mostrar los portafolios existentes.
		public function mostrarPortafolio()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$result1 = $this->portafolio->mostrarPortafolio(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$mostrar = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			$this->load->view("portafolios/lista_portafolio", $mostrar); //A tráves de la variable data le mandamos el resultado a la vista
			$this->load->view("footer");
		}

		//Función que permite cargar el formulario para crear un nuevo formulario.
		public function cargarFormulario($id_portafolio){ //Recuperamos de la función de insertar el último id que fue inserdado.
			$id = array ('id_portafolio' => $id_portafolio); //Almacenamos en un arreglo el id que se obtuvo.
			$this->load->view("head", $id);
			$this->load->view("nav", $id);
			$this->load->view("portafolios/form_portada", $id);
			$this->load->view("portafolios/form_servicio", $id);
			$this->load->view("portafolios/form_equipo", $id);
			$this->load->view("portafolios/form_experiencia", $id);
			$this->load->view("portafolios/form_contenido", $id);
			/*
				Código que permite obtener de base de datos

			$datos = $this->comentario->obtenerDatos($id);
			if($datos != FALSE){
				foreach ($datos->result() as $row) {
					$comentario = $row->comentario;
				}
			
				$data_comentario = array('id_portafolio' => $id_portafolio,
							  'comentario' => $comentario
								);
			}else{
				$comentario = '';
				return FALSE;
			}
			$this->load->view("portafolios/form_comentario", $data_comentario); */

			$this->load->view("portafolios/form_general", $id);
			$this->load->view("footer", $id);
		}

		//Función que permite cargar el formulario de nuevo portafolio
		public function nuevoPortafolio(){
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/nuevo_portafolio");
			$this->load->view("footer");
		}	
			
		//Función que permite insertar un nuevo portafolio
		public function insertarPortafolio(){
			$inputs = array (
				'nombre' => $this->input->post('nombre', TRUE), //Se asigna a un arreglo el valor que obtiene de los input de nuevo portafolio.
				'comentario' => $this->input->post('comentario', TRUE)
				); 
			$id_portafolio = $this->portafolio->insertarPortafolio($inputs); //Se le manda al método el valor que se obtuvo de los inputs
			redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función

		}

		//Función que permite cancelar la creación de un portafolio.
		public function cancelarPortafolio($id){ //Se le pasa el valor del arreglo id
			$this->portafolio->cancelarPortafolio($id); //A la función del modelo se le pasa el arreglo del id
			redirect('/portafolios/c_portafolios/mostrarPortafolio '); //Redirecciona al mismo controlador pero a otra función
		}

		/*
		//Funciones de Comentario de Portafolio
		*/

		/*Función que permite obtener datos de portafolio
		public function obtenerDatos($id_p){
			$id = array ('id_p' => $id_p); 
			$datos = $this->comentario->obtenerDatos($id);


			if($datos != FALSE){
				foreach ($datos->result() as $row) {
					$comentario = $row->comentario;
				}
			
				$data = array('id_portafolio' => $id_p,
							  'comentario' => $comentario
								);
			}else{
				$data = '';
				return FALSE;
			}
			$this->load->view("portafolios/form_comentario", $data);
		}
		*/
		//Función que permite insertar comentario

		public function insertarComentario($id_portafolio){
			$inputsComentario = array('id_portafolio' => $id_portafolio,
									  'nombre' => ' nombrePrueba',
									  'comentario' => $this->input->post('comentario', TRUE)
									 );
			print_r($inputsComentario);
			$id_portafolio = $this->comentario->insertarComentario($inputsComentario);
			//redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio);
		}
	}	
?>