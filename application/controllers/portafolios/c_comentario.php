<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de sección comentario
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/

	class C_comentario extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('portafolios/comentario'); //Cargamos el modelo que se usará en todo el controlador
		}


		public function insertar($id_p){
			//Se asigna a un arreglo el valor que obtiene de los inputs de comentario de portafolio.
			$inputs = array(
				'id_portafolio' => $id_p,
				'nombre' => 'nombre',
				'comentario' => $this->input->post('comentario')				); 
			print_r ($inputs);
			$id_portafolio = $this->comentario->insertarComentario($inputs); //Se le manda al método el valor que se obtuvo de los inputs
			redirect('/portafolios/c_portafolios/cargarFormulario'.'/'.$id_portafolio); //Redirecciona al mismo controlador pero a otra función

		}
	}


?>