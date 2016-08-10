<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de seccion de gráficos de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 30 de Junio del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Grafico extends CI_Model
{	

		//Función que permite consultar si existe un registro en la tabla portafolios-imagen para evaluar
	public function obtenerContenido($id){
		/*
		//Select * 
		From portafolio_imagen
		inner join imagen
		on portafolio_imagen.id_img = imagen.id_img
		inner join tipo_imagen
		on imagen.id_tipo_img = tipo_imagen.id_tipo_img
		where portafolio_imagen.id_portafolio = $id['id_portafolio']
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $id['id_portafolio']);
		//$this->db->where('tipo_imagen.id_tipo_img', 3);
		$query = $this->db->get();
		if($query->num_rows()>0){
			/*
			select pi.id_por_ima, pi.id_portafolio, pi.id_img, i.id_img as id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img
			from portafolio_imagen pi
			inner join imagen i
			on pi.id_img = i.id_img
			inner join tipo_imagen ti
			on i.id_tipo_img = ti.id_tipo_img
			where i.id_tipo_img = 3 and pi.id_portafolio = $id['id_portafolio']

			Esta consulta verifica que si existen registro estos coincidan con el tipo de gráfico experiencia
			*/
			$this->db->select('pi.id_por_ima, pi.id_portafolio, pi.id_img , i.id_img as id_img, i.nom_img, i.url_img, i.id_tipo_img, ti.id_tipo_img');
			$this->db->from('portafolio_imagen pi');
			$this->db->join('imagen i', 'pi.id_img = i.id_img');
			$this->db->join('tipo_imagen ti','i.id_tipo_img = ti.id_tipo_img');
			$this->db->where('i.id_tipo_img', 4);
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
			Y si no, realiza una consulta para obtener los id de las imagenes que estarán marcadas por default.
			*/
			$this->db->select('id_img');
			$this->db->from('imagen');
			$this->db->where('id_img', 18);//id de impagenes que van por default
			$this->db->where('id_tipo_img', 4); 
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


	public function eliminarContenido($data){
		$this->db->query("DELETE portafolio_imagen
		FROM portafolio_imagen
		INNER JOIN imagen 
		ON portafolio_imagen.id_img = imagen.id_img
		INNER JOIN tipo_imagen
		ON imagen.id_tipo_img = tipo_imagen.id_tipo_img
		WHERE tipo_imagen.id_tipo_img = 4 AND portafolio_imagen.id_portafolio = ".$data['id_portafolio']."");
		$this->db->get();		
		
		/*$this->db->join("imagen", "portafolio_imagen.id_img = imagen.id_img");
		$this->db->join("tipo_imagen", "imagen.id_tipo_img = tipo_imagen.id_tipo_img");
		$this->db->where("tipo_imagen.id_tipo_img", 4);
		$this->db->where('portafolio_imagen.id_portafolio', $data['id_portafolio']); 
   		$this->db->delete('portafolio_imagen');*/
	}

	public function insertarContenido($data, $id_img, $cont){
		$arrayCont = explode (", " , $cont['id_img']);
		for($i=0; $i <= count($arrayCont) ;$i++) {
			if(!empty($id_img['id_img'][$i])){
				$sql = " INSERT INTO portafolio_imagen (id_por_ima, id_portafolio, id_img) 
					     VALUES ('',".$data['id_portafolio'].",".$id_img['id_img'][$i].")";
				$this->db->query($sql);
				echo '<br><br>';
			}else{
			}
		  return $sql;
		  echo "<br><br>";   
		}
	}

	//Función que permite validar si existen registros en la base de datos donde este relacionado portafolio_tipo y tipo_proyecto 
	public function actualizarContenido($data, $id_img, $cont){
		/*
		SELECT * 
		FROM portafolio_imagen
		INNER JOIN imagen 
		ON portafolio_imagen.id_img = imagen.id_img
		INNER JOIN tipo_imagen
		ON imagen.id_tipo_img = tipo_imagen.id_tipo_img
		WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND tipo_imagen.id_tipo_img = 4
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join("imagen", "portafolio_imagen.id_img = imagen.id_img");
		$this->db->join("tipo_imagen", "imagen.id_tipo_img = tipo_imagen.id_tipo_img");
		$this->db->where("portafolio_imagen.id_portafolio", $data['id_portafolio']);
		$this->db->where("tipo_imagen.id_tipo_img", 4);
		$query = $this->db->get();

		if($query->num_rows()>0){
			$this->eliminarContenido($data);
			$this->insertarContenido($data, $id_img, $cont);
		}else{ 
			$this->insertarContenido($data, $id_img, $cont);
		}
	}

	//Paginación experiencia
	public function num_contenido(){
		//SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 1
		$numero = $this->db->query("SELECT count(*) as number FROM imagen INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 4")->row()->number; //Regresa el número total de filas de una tabla
		return intval($numero);
	}

	public function obtener_pagina($numero_por_pagina, $id){ //$numero_por_pagina viene del controlador
		//$this->db->get();
		/*SELECT * FROM portafolio_imagen RIGHT JOIN imagen ON portafolio_imagen.id_img = imagen.id_img AND portafolio_imagen.id_portafolio = 14 RIGHT JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 4*/
		/*$uri = $this->uri->segment(5);
		$this->db->query("SELECT portafolio_imagen.id_portafolio, 
			                     portafolio_imagen.id_img, 
			                     imagen.id_img, 
			                     imagen.id_tipo_img, 
			                     imagen.nom_img, 
			                     imagen.url_img, 
			                     imagen.url_thu, 
			                     tipo_imagen.id_tipo_img, 
			                     tipo_imagen.nom_tipo
			              FROM portafolio_imagen 
			              RIGHT JOIN imagen 
			              ON portafolio_imagen.id_img = imagen.id_img 
			              AND portafolio_imagen.id_portafolio = ".$id['id_portafolio']."
			              RIGHT JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 4");
		$this->db->limit($numero_por_pagina, $uri);
		$this->db->get();*/

		/*"SELECT portafolio_imagen.id_portafolio, 
			                     portafolio_imagen.id_img, 
			                     imagen.id_img, 
			                     imagen.id_tipo_img, 
			                     imagen.nom_img, 
			                     imagen.url_img, 
			                     imagen.url_thu, 
			                     tipo_imagen.id_tipo_img, 
			                     tipo_imagen.nom_tipo
			              FROM portafolio_imagen 
			              RIGHT JOIN imagen 
			              ON portafolio_imagen.id_img = imagen.id_img AND portafolio_imagen.id_portafolio = ".$id['id_portafolio']."
			              RIGHT JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE imagen.id_tipo_img = 4", $numero_por_pagina, $this->uri->segment(5));*/
        /*$this->db->select('portafolio_imagen.id_portafolio as id_porta, 
			               portafolio_imagen.id_img as id_imgP, 
			               imagen.id_img as id_imgI, 
			               imagen.id_tipo_img as id_tipo_imgI, 
			               imagen.nom_img as nom_img, 
			               imagen.url_img as url_img, 
			               imagen.url_thu as url_thu, 
			               tipo_imagen.id_tipo_img as id_tipo_imgT, 
			               tipo_imagen.nom_tipo as nom_tipo');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img', 'RIGHT');
		$this->db->join('imagen', 'portafolio_imagen.id_portafolio ='.$id['id_portafolio'].'', 'RIGHT');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');*/
		$this->db->where('id_tipo_img', 4);
		$query = $this->db->get("imagen", $numero_por_pagina, $this->uri->segment(5));
		return $query;
	}


}