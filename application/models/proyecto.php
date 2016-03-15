<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Proyecto extends CI_Model {
 
 	public function mostrarProyecto(){
 		/*
		//SELECT * FROM portafolio
		*/
    	return $this->db->get('proyecto');
  	}

 }
?>