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
class C_servicio extends MY_Controller
{
	/*
	function __construct()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->model('portafolios/portafolio'); 
		$this->load->model('portafolios/portada');
		$this->load->model('portafolios/servicio');
	}
	*/


	public function validarServicio($id_portafolio)
	{
		/*
		//Validaciones del formulario
		//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
		//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
		*/
		$this->form_validation->set_rules(
			'servicio[]', 
			'', 'required', array('¡Debes seleccionar al menos una opción!' )
		);

		$this->form_validation->set_rules(
			'descripcion[]', 
			'', 'required', array('¡Debes escribir un mensaje!' )
		);

		//$this->form_validation->set_message('required', '¡Debes seleccionar al menos una opción!');
		//$this->form_validation->set_rules('descripcion[]', 'descripción', 'required|max_length[350]');
		//$this->form_validation->set_message('required', '¡El campo %s no puede ir vacío!');
		//$this->form_validation->set_message('max_length', '¡El campo %s no puede superar 350 caracteres!');
		//Si el formulario pasa la validación se procesa el siguiente método

		if ($this->form_validation->run() == FALSE) 
		{
			//Si el formulario no se válida se muestran los errores
	        $this->cargar($id_portafolio); //Se modificará para que cargue los alert en el modal
	        echo 'fail';
		}else
		{
			/*
			$id_portafolio = $id_portafolio;
			$data  = array('id_portafolio' => $id_portafolio,
				 		   'id_tipo' => implode(", ", $this->input->post('servicio')),
				 		   'descripcion' => $this->input->post('descripcion')
				 		   );*/
			//$this->portada->insertarPortada($port_img);
			//print_r($data);
			//redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
			echo 'successful';
		    $this->insertarServicio($id_portafolio);
		}
	}

	public function insertarServicio($id_portafolio){
				$id_portafolio = $id_portafolio;
				/*$data  = array(
					'id_portafolio' => $id_portafolio,
				 	array('descripcion' => $this->input->post('descripcion')),
					array('id_tipo' => implode(", ", $this->input->post('servicio')))
					); */
				$data = array('id_portafolio' => $id_portafolio);
				$descripcion = array('descripcion' => $this->input->post('descripcion'));
				$tipo = array('id_tipo' => $this->input->post('servicio'));
				//$tipo = array('id_tipo' => implode(", ", $this->input->post('servicio')));
				//$descripcion = array('descripcion' => implode(", ", $this->input->post('descripcion')));
				print_r($tipo);
				print_r($descripcion);
				//$array = implode(",", $tipo);
				//$cont = count($array);
				$this->servicio->insertarServicio($data, $descripcion, $tipo);

				//redirect('/portafolios/c_portada/cargar'.'/'.$id_portafolio); 
				echo 'successful';
	}


}
?>