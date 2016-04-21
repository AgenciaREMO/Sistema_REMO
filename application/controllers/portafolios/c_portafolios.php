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
			$this->load->view('portafolios/nuevo_portafolio');
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
			$query = $this->portada->obtenerPortada($id);
			$consulta = $this->portada->portadasDisponibles($id);
			$consulta1 = $this->portada->portadaAnterior($id);
				if($query != FALSE){
					foreach ($query->result() as $row) {
						$url_img = $row->url_img;
						$nom_img = $row->nom_img;
					}
				
					$img= array(
						'id_portafolio' => $id_portafolio,
						'url_img' => $url_img,
						'nom_img' => $nom_img,
						'consulta' => $consulta,
						'consulta1' => $consulta1
									);
				}else{
					$id_portafolio = $id_portafolio;
					$url_img = '';
					$nom_img = '';
					$id_img = '';
					$url_img2 = '';
					$nom_img2 = '';
					return FALSE;
				}
			$this->load->view("portafolios/form_portada", $img);
			$this->load->view("portafolios/form_servicio", $id);
			//$this->load->view("portafolios/form_equipo", $id);
			//$this->load->view("portafolios/form_experiencia", $id);
			//$this->load->view("portafolios/form_contenido", $id);
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
				//Si pasa las validaciones realiza la inserción de portafolio
				$inputs = array (
					'nombre' => $this->input->post('nombre', TRUE), //Se asigna a un arreglo el valor que obtiene de los input de nuevo portafolio.
					'comentario' => $this->input->post('comentario', TRUE)
					); 
				$id_portafolio = $this->portafolio->insertarPortafolio($inputs); //Se le manda al método el valor que se obtuvo de los inputs
				redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función
			}

		}

		//Función que permite cancelar la creación de un portafolio.
		public function cancelarPortafolio($id){ //Se le pasa el valor del arreglo id
			$this->portafolio->cancelarPortafolio($id); //A la función del modelo se le pasa el arreglo del id
			redirect('/portafolios/c_portafolios/mostrarPortafolio '); //Redirecciona al mismo controlador pero a otra función
		}
	}	
?>