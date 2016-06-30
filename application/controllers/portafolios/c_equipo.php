<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de sección equipo de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 20 de junio del 2016
//Fecha de modificación: 
*/

/**
* 
*/
class C_equipo extends MY_Controller
{	
	//Función que permite cargar el formulario de equipo de trabajo de remo
	public function cargarEquipo($id_portafolio){
		$id = array('id_portafolio' => $id_portafolio);
		$this->load->view("head", $id);
		$this->load->view("nav", $id);
		$this->load->view("portafolios/port");

		$consulta = $this->equipo->mostrarPersonal(); 
		$dataEquipo = array('dataEquipo'=> $consulta,'id_portafolio'=>$id_portafolio);

		$this->load->view("portafolios/seccion_equipo", $dataEquipo);
		$this->load->view("portafolios/form_general", $id);
		$this->load->view("footer", $id);
	}

	








}