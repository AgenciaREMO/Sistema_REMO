<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de la sección de servicios de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/

/**
* 
*/
class C_servicios extends MY_Controller
{
	/*
	function __construct()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->model('portafolios/portafolio'); 
		$this->load->model('portafolios/portada');
		$this->load->model('portafolios/servicio');
	}*/


	public function validarServicio($id_portafolio)
	{
		/*
		//Validaciones del formulario
		//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
		//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
		*/
		$this->form_validation->set_rules('servicio[]', '', 'required');
		$this->form_validation->set_message('required', '¡Debes seleccionar al menos una opción!');
		$this->form_validation->set_rules('descripcion[]', 'descripción', 'required|max_length[350]');
		$this->form_validation->set_message('required', '¡El campo %s no puede ir vacío!');
		$this->form_validation->set_message('max_length', '¡El campo %s no puede superar 350 caracteres!');
		//Si el formulario pasa la validación se procesa el siguiente método
		if ($this->form_validation->run() == FALSE) 
		{
			//Si el formulario no se válida se muestran los errores
	        $this->cargar($id_portafolio); //Se modificará para que cargue los alert en el modal
		}else{
		    $this->insertarServicio($id_portafolio);
		}
	}

	public function insertarServicio($id_portafolio){
				$id_portafolio = $id_portafolio;
				$data  = array('id_portafolio' => $id_portafolio,
				 			   'id_tipo' => implode(", ", $this->input->post('servicio')),
				 			   'descripcion' => $this->input->post('descripcion')
				 			   );
				//$this->portada->insertarPortada($port_img);
				print_r($data);
				//redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
				echo 'successful';
	}


}
?>