<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de seccion de equipo de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 20 de junio del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Equipo extends CI_Model
{	
	//Función que permite mostrar el personal disponible para insertar en el portafolio.
	public function mostrarPersonal()
	{
		//SELECT * FROM personal
		return $this->db->get('personal');
	}

	public function obtener_personal ($id){
		$query = $this->db->query("SELECT pp.id_personal as id_personalP, 
							       pp.id_portafolio as id_portafolioP, 
							       pp.destacado as destacado, 
							       p.id_personal as id_personal, 
							       p.nombre as nombre, 
							       p.telefono as telefono, 
							       p.celular as celular, 
							       p.email as email, 
							       p.especializacion as especializacion, 
							       p.puesto as puesto, 
							       p.desc_cv as desc_cv
							FROM portafolio_personal as pp
							RIGHT JOIN personal as p ON pp.id_personal = p.id_personal and pp.id_portafolio = ".$id['id_portafolio']."");
		return $query;
	}

		//Paginación contenido
	public function num_equipo(){
		//SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 1
		$numero = $this->db->query("SELECT count(*) as number 
		                            FROM imagen 
		                            INNER JOIN tipo_imagen 
		                            ON imagen.id_tipo_img = tipo_imagen.id_tipo_img 
		                            WHERE imagen.id_tipo_img = 2")->row()->number; //Regresa el número total de filas de una tabla
		return intval($numero);
	}

	public function obtener_slide($id){
		$query = $this->db->query("SELECT pi.id_por_ima as id_por_ima, 
			                     pi.id_portafolio as id_porta, 
			                     pi.id_img as id_imgP, 
			                     i.id_img as id_imgI, 
			                     i.nom_img as nom_img, 
			                     i.url_img as url_img, 
			                     i.url_thu as url_thu, 
			                     i.id_tipo_img as id_tipo_imgI, 
			                     ti.id_tipo_img as id_tipo_imgT, 
			                     ti.nom_tipo as nom_tipo 
			                     FROM portafolio_imagen as pi
					             RIGHT JOIN imagen as i ON pi.id_img = i.id_img AND pi.id_portafolio = ".$id['id_portafolio']."
					             RIGHT JOIN tipo_imagen as ti ON i.id_tipo_img = ti.id_tipo_img
					             WHERE i.id_tipo_img = 2 ");
		return $query;
	}

		//Función que permite consultar si existe un registro en la tabla portafolios-imagen para evaluar
	public function obtenerSlide($id){
		/*
		//Select * from portafolio_imagen
		inner join imagen
		on portafolio_imagen.id_img = imagen.id_img
		inner join tipo_imagen
		on imagen.id_tipo_img = tipo_imagen.id_tipo_img
		where portafolio_imagen.id_portafolio = 16
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $id['id_portafolio']);
		//$this->db->where('tipo_imagen.id_tipo_img', 1);
		$query = $this->db->get();
		if($query->num_rows()>0){
			/*SELECT
			//SELECT portafolio_imagen.id_por_ima, portafolio_imagen.id_portafolio, portafolio_imagen.id_img, imagen.nom_img, imagen.id_img, imagen.url_img, imagen.id_tipo_img, tipo_imagen.id_tipo_img 
			//FROM portafolio_imagen 
			//INNER JOIN imagen
			//ON portafolio_imagen.id_img = imagen.id_img
			//INNER JOIN tipo_imagen
			//ON imagen.id_tipo_img = tipo_imagen.id_tipo_img
			*/
			$this->db->select('pi.id_por_ima, pi.id_portafolio, pi.id_img , i.id_img as id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img');
			$this->db->from('portafolio_imagen pi');
			$this->db->join('imagen i', 'pi.id_img = i.id_img');
			$this->db->join('tipo_imagen ti','i.id_tipo_img = ti.id_tipo_img');
			$this->db->where('i.id_tipo_img', 2);
			$this->db->where('pi.id_portafolio', $id['id_portafolio']);
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Modificar';
      	}else{
      	
         	/*
			//$query = $this->db->query('SELECT nom_img, url_img, url_thu FROM imagen WHERE id_img = 1 AND id_tipo_img = 1');
			*/
			$this->db->select('id_img');
			$this->db->from('imagen');
			$this->db->where('id_img', 16);
			$this->db->where('id_tipo_img', 2);
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar';    	
      	}

	}

		//Función que trae el id de la de default
	public function equipoDisponible(){
         	/*
			//$query = $this->db->query('SELECT nom_img, url_img, url_thu FROM imagen WHERE id_img = 1 AND id_tipo_img = 1');
			*/
			$this->db->select('*');
			$this->db->from('imagen');
			$this->db->where('id_tipo_img', '2');
			$id_img_checked_default = $this->db->get();
			if($id_img_checked_default->num_rows()>0){
	        	return $id_img_checked_default;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar'; 
	}

}