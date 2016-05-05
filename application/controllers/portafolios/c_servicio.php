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
class C_servicios extends CI_Controller
{
	
	function __construct(argument)
	{
		$this->load->model('portafolios/portafolio'); //Cargamos el modelo que se usará en todo el controlador
		$this->load->model('portafolios/servicio');
	}



?>