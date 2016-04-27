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
			$this->load->helper(array('form', 'url'));
			$this->load->model('portafolios/portafolio'); //Modelo para portafolios en general
			$this->load->model('portafolios/portada'); //Modelo para portada
			$this->load->model('portafolios/comentario'); //Modelo de comentario
		}

		public function index()
		{
			$this->nuevoPortafolio();
		}
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

		//Función que permite cargar el formulario de nuevo portafolio
		public function nuevoPortafolio(){
			$this->load->view("head");
			$this->load->view("nav");
			$this->load->view("portafolios/nuevo_portafolio");
			$this->load->view("footer");
		}	
		//Función que valida los campos
		public function validar(){
			/*
			//Validaciones del formulario
			//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
			//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
			*/
			$this->form_validation->set_rules('nombre', 'nombre del portafolio', 'trim|required|min_length[10]|max_length[100]|is_unique[portafolio.nombre]');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de %d carácteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener un maximo de %d carácteres');
			$this->form_validation->set_message('is_unique', 'Existe otro campo %s registrado con ese nombre');
			$this->form_validation->set_rules('comentario', ' comentario del portafolio', 'trim|required|min_length[10]|max_length[100]');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de %d carácteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener un maximo de %d carácteres');

			//Condición que válida que haya pasado las validaciones el formulario
			if ($this->form_validation->run() == FALSE)
			{
				//Si es falso, recarga la vista del formulario con los errores por corregir
				$this->nuevoPortafolio();   
			}
			else{
				$this->insertarPortafolio();
			}
		}
		//Función que permite insertar un nuevo portafolio
		public function insertarPortafolio(){
			
			//Si pasa las validaciones realiza la inserción de portafolio
			$inputs = array (
				'nombre' => $this->input->post('nombre', TRUE), //Se asigna a un arreglo el valor que obtiene de los input de nuevo portafolio.
				'comentario' => $this->input->post('comentario', TRUE)
				); 
			$id_portafolio = $this->portafolio->insertarPortafolio($inputs); //Se le manda al método el valor que se obtuvo de los inputs
			redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función
		}

		//Función que permite cancelar la creación de un portafolio.
		public function cancelarPortafolio($id){ //Se le pasa el valor del arreglo id
			$this->portafolio->cancelarPortafolio($id); //A la función del modelo se le pasa el arreglo del id
			redirect('/portafolios/c_portafolios/mostrarPortafolio '); //Redirecciona al mismo controlador pero a otra función
		}
	}	
?>