<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de contenido gráfico de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 16 de Marzo del 2016
//Fecha de modificación: 
*/

	class C_imagenes extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('imagen'); //Cargamos el modelo que se usará en todo el controlador
		}

		public function mostrar()
		{
			$this->load->view("head");
			$this->load->view("nav");
			$result1 = $this->imagen->mostrarImagen(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$mostrar = array ('consulta1' => $result1); //Almacenamos el valor en un arreglo
			$this->load->view("imagenes/lista_imagen", $mostrar); //A tráves de la variable data le mandamos el resultado a la vista
			$this->load->view("footer");
		}

		public function nueva(){
			$this->load->view("head");
			$this->load->view("nav");
			$result1 = $this->imagen->obtenerTipoImg(); //Asignamos a una variable la función que arroja el resultado de la consulta a base de datos.
			$tipos = array ('consulta1' => $result1);
			$this->load->view("imagenes/nueva_imagen", $tipos); 
			$this->load->view("footer");
		}	

		public function insertar(){
			
			$inputs = array (
				'nombre' => $this->input->post('nombre', TRUE), //Se asigna a un arreglo el valor que obtiene de los input de nueva imagen
				'id_tipo_img' => $this->input->post('tipos')
				); 
			$this->imagenes->insertarImagen($inputs); //Se le manda al método el valor que se obtuvo de los inputs
			//$id_portafolio = $this->portafolio->insertarPortafolio($inputs); 
			redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función

		}

    }