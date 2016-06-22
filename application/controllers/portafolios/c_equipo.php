<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Controlador de la sección de equipo de portafolios personalizados
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

//Función que permite mostrar el personal disponible
		public function mostrarPersonal($id_portafolio)
		{
			$this->load->view("head");
			$this->load->view("nav");
			$consulta = $this->equipo->mostrarPersonal();
			$mostrar = array('resultado' => $consulta,'id_portafolio' => $id_portafolio);
			$this->load->view("portafolios/form_equipo", $mostrar);
			$this->load->view("footer");
		}



}