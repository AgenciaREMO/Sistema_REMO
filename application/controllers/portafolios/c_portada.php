<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de la sección de portada de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/

	class C_portada extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('portafolios/portafolio'); //Cargamos el modelo que se usará en todo el controlador
		}

			
	//Función que permite mostrar la portada actual
	public function mostrarPortadaActual()
	{

	}
	//Función que permite mostrar las portadas usadas anteriormente
	public function mostrarPortadasAnteriores()
	{

	}
	//Función que permite insertar una nueva imagen al sistema de base de datos.
	public function insertarPrtada()
	{

	} 

	}