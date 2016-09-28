<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de sección servicio de portafolios
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
	//Función que permite cargar la vista de servicio
	public function cargarServicio($id_portafolio){	
		$id = array ('id_portafolio' => $id_portafolio);
		$this->load->view("head", $id);
		$this->load->view("nav", $id);
		$this->load->view("portafolios/bread-servicios");
		$this->load->view("portafolios/port");
		$consultarServicio = $this->servicio->consultarServicio($id);
		//$obtenerServicio= $this->servicio->obtenerServicio($id);
		//Arreglo que envía "arreglos" a la vista para manejarlos.
		$dataServicio= array('id_portafolio' => $id_portafolio,/*
							 'obtenerServicio' => $obtenerServicio,*/
							 'consultarServicio' => $consultarServicio);

		/*if($obtenerServicio != FALSE){
				//Se hace la consulta si existen portadas relacionadas con el id actual y dependiendo de eso checked el radio
				foreach ($obtenerServicio->result() as $row) {
					$checkServicio = $row->id_tipo;
					print_r($checkServicio);
				}
				//Arreglo que envía "arreglos" a la vista para manejarlos.
				$dataServicio= array('id_portafolio' => $id_portafolio,
									'checkServicio' => $checkServicio,
									'consultarServicio' => $consultarServicio);
				
			//Si no existe devuelte valores falsos
			}else{
				$id_portafolio = $id_portafolio;
				return FALSE;
			}*/

		$this->load->view("portafolios/seccion_servicio", $dataServicio);
		$this->load->view("portafolios/form_general", $id);
		$this->load->view("footer", $id);
	}

	//Función que permite validar el formulario para insertar los servicios con cierto portafolio
	public function validarServicio($id_portafolio)
	{
		/*
		//Validaciones del formulario
		//$this->form_validation->set_rules('name_input', 'Identificador', 'reglas de validación');
		//$this->form_validation->set_message('regladevalidacion', 'mensajepersonalizado');
		*/
		$this->form_validation->set_rules(
			'servicio[]', 
			'', 'required', array('<div class="alert alert-danger" role="alert"> ¡Debes seleccionar al menos una opción!</div>' )
		);

		$this->form_validation->set_rules(
			'descripcion[]', 
			'', 'required', array('<div class="alert alert-danger" role="alert"> ¡Debes escribir un mensaje!</div>' )
		);

		//$this->form_validation->set_message('required', '¡Debes seleccionar al menos una opción!');
		//$this->form_validation->set_rules('descripcion[]', 'descripción', 'required|max_length[350]');
		//$this->form_validation->set_message('required', '¡El campo %s no puede ir vacío!');
		//$this->form_validation->set_message('max_length', '¡El campo %s no puede superar 350 caracteres!');
		//Si el formulario pasa la validación se procesa el siguiente método

		if ($this->form_validation->run() == FALSE) 
		{
			//Si el formulario no se válida se muestran los errores
	        $this->cargarServicio($id_portafolio);
	        //echo 'fail';
		}else
		{
			//Si es válido se realiza la función de insertar
		    $this->actualizarServicio($id_portafolio);
		    //echo 'successful';
		}
	}

	//Función que permite insertar servicios relacionados con cierto id de portafolio
	public function actualizarServicio($id_portafolio){
				$id_portafolio = $id_portafolio;
				$data = array('id_portafolio' => $id_portafolio);
				$descripcion = array('descripcion' => $this->input->post('descripcion'));
				$tipo = array('id_tipo' => $this->input->post('servicio'));
				$cont = array('id_tipo' => implode(", ", $this->input->post('servicio')));
				$this->servicio->actualizarServicio($data, $descripcion, $tipo, $cont);
				redirect('/portafolios/c_servicio/cargarServicio'.'/'.$id_portafolio); 
				//echo 'successful';
	}


/*
//$data  = array('id_portafolio' => $id_portafolio,array('descripcion' => $this->input->post('descripcion')),array('id_tipo' => implode(", ", $this->input->post('servicio')))); 
//$tipo = array('id_tipo' => implode(", ", $this->input->post('servicio')));
				$descripcion = array('descripcion' => implode(", ", $this->input->post('descripcion')));
				print_r($tipo);
				print_r($descripcion);
				$array = implode(",", $tipo);
				$cont = count($array);
				//
*/


}
?>