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
class Equipo extends CI_Model{	
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
							       pp.seleccion as seleccion,  
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
		$this->db->where('imagen.id_tipo_img', 2);
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
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar'; 
	}

	/*
	//Funcion que permite eliminar equipo existente para poder insertar nuevamente
	public function eliminarEquipo($data){
		$this->db->where('id_portafolio', $data['id_portafolio']); 
   		$this->db->delete('portafolio_personal');
   		echo "elimino personal <br><br>";
	}

	//Funcion que permite insertar el equipo seleccionado para el curriculum
	public function insertarEquipo($data, $id_personal, $destacado, $cont){
		$arrayCont = explode (", " , $cont['id_personal']);
		for($i=0; $i <= count($arrayCont) ;$i++){
			if (!empty($id_personal['id_personal'][$i]) && !empty($destacado['destacado'][$i])) {
				# code...
				$sql = " INSERT INTO portafolio_personal (id_por_per, id_personal, id_portafolio, destacado) 
					     VALUES ('',".$id_personal['id_personal'][$i].",".$data['id_portafolio'].", 1)";
				echo $sql;
				$this->db->query($sql);
			}elseif (!empty($id_personal['id_personal'][$i])) {
				# code...
				$sql = " INSERT INTO portafolio_personal (id_por_per, id_personal, id_portafolio, destacado) 
					     VALUES ('',".$id_personal['id_personal'][$i].",".$data['id_portafolio'].", 0)";
				echo $sql;
				$this->db->query($sql);	
			}
		  echo "<br><br>";   
		}

		echo "inserto personal <br><br>";
	}*/

	//Funciòn que permite editar el slide que se ha insetado
	public function editarSlide($port_img){
		//Comentar update
		$this->db->where('id_portafolio', $port_img['id_portafolio']);
		$this->db->update('portafolio_imagen', array('id_img' => $port_img['id_img']));
		echo "edito slider <br><br>";
	}

	//Funcion que permite inserta un slide seleccionado
	public function insertarSlide($port_img){
		//Comentar insert
		$registro_p_i = $this->db->insert('portafolio_imagen', $port_img);
		echo "inserto slider <br><br>";
	}

	//Función que permite validar si existen registros en la base de datos donde este relacionado portafolio_tipo y tipo_proyecto 
	/*public function actualizarEquipo($data, $destacado, $id_personal, $cont, $port_img){
		//SELECT * FROM portafolio_tipo WHERE id_portafolio = $id['id_portafolio']

		
		$this->db->select('portafolio_imagen.id_portafolio');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('tipo_imagen.id_tipo_img', 2);
		$this->db->where('portafolio_imagen.id_portafolio', $data['id_portafolio']);
		$query = $this->db->get();
		if($query->num_rows()>0){
			echo "encontro personal en la tabla portafolio personal <br><br>";
			$this->db->select('*');
			$this->db->from('portafolio_personal');
			$this->db->where('id_portafolio', $data['id_portafolio']);
			$query = $this->db->get();
			if($query->num_rows()>0){	//Si existe hace un update
				//Actualiza todos los registros, tanto los del personal como el slide que se va a mostrar
				echo "encontro slider en la tabla portafolio imagen <br><br>";
				$this->eliminarEquipo($data);
				$this->insertarEquipo($data, $destacado, $id_personal, $cont);
				$this->editarSlide($port_img);
			}else{ //Actualiza sòlo los registros de personal en caso de que no haya slide seleccionado
				echo "encontro slider pero no personal y modifica <br><br>";
				$this->insertarEquipo($data, $destacado, $id_personal, $cont);
				$this->insertarSlide($port_img);
			}
		}else{
			echo "nada";
			$this->insertarEquipo($data, $destacado, $id_personal, $cont);
			$this->insertarSlide($port_img);
		}*/
		//Función que permite validar si existen registros en la base de datos donde este relacionado portafolio imagen y alguna imagen de experiencia 
	public function actualizarEquipo($data, $insert2, $port_img){
		/*SELECT * FROM portafolio_imagen WHERE id_portafolio = $data['id_portafolio'] */
		$this->db->select('*');
		$this->db->from('portafolio_personal');
		$this->db->where('id_portafolio', $data['id_portafolio']);
		$query_personal = $this->db->get();

		/*SELECT portafolio_imagen.id_portafolio FROM portafolio_imagen INNER JOIN imagen ON portafolio_imagen.id_img = imagen.id_img INNER JOIN tipo_imagen ON imagen.id_tipo_img = tipo_imagen.id_tipo_img WHERE tipo_imagen.id_tipo_img = 2 AND portafolio_imagen.id_portafolio = $data['id_portafolio']*/
		$this->db->select('portafolio_imagen.id_portafolio');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('tipo_imagen.id_tipo_img', 2);
		$this->db->where('portafolio_imagen.id_portafolio', $data['id_portafolio']);
		$query_slider = $this->db->get();

		if(($query_personal->num_rows()>0) && ($query_slider->num_rows()>0)){
			//Encontro personal
			$this->eliminarEquipo($data);
			$this->eliminarImagen($data);
			$this->insertarEquipo($data, $insert2);
			$this->insertarImagen($data, $port_img);
			echo "Encontro personal e imagen";
		}else{
			if(($query_personal->num_rows()>0) && ($query_slider->num_rows()<1)){
				//Encontro personal pero no imagen slider
				$this->eliminarEquipo($data);
				$this->insertarEquipo($data, $insert2);
				$this->insertarImagen($data, $port_img);
				echo "Encontro personal pero no imagen slider";
			}else{
				//No encontro ni personal ni slider
				$this->insertarEquipo($data, $insert2);
				$this->insertarImagen($data, $port_img);
				echo "No encontro ni personal ni slider";
			}
		}
	}

	//Funcion que permite eliminar equipo existente para poder insertar nuevamente
	public function eliminarEquipo($data){
		/*$this->db->where('id_portafolio', $data['id_portafolio']); 
   		$this->db->delete('portafolio_personal');*/
   		echo "elimino personal <br><br>";
	}

	public function eliminarImagen($data){
   		/*$this->db->query("DELETE portafolio_imagen
						  FROM portafolio_imagen
						  INNER JOIN imagen 
						  ON portafolio_imagen.id_img = imagen.id_img
						  INNER JOIN tipo_imagen
						  ON imagen.id_tipo_img = tipo_imagen.id_tipo_img
						  WHERE tipo_imagen.id_tipo_img = 2 AND portafolio_imagen.id_portafolio = ".$data['id_portafolio']."");*/
   		echo "elimino imagen <br><br>";
	}

	public function insertarEquipo($data, $insert2){

		foreach ($insert2 as $key => $value) {
			$bin = decbin($value);
			if ($value == 1 || $value == 0) {
				$bin = "0".$bin;
			}
			echo $bin;
			$binarray = str_split($bin);
			print_r($binarray);
			$sql = " INSERT INTO portafolio_personal (id_por_per, id_personal, id_portafolio, seleccion, destacado) 
					 VALUES ('', ".$key." , ".$data['id_portafolio'].", ".$key." , $binarray[1])";
						 //$this->db->query($sql);
						 echo $sql;
						 //echo "</br>";
						 echo "inserto personal <br><br>";
	    }
	}

	public function insertarImagen($data, $port_img){
		//Comentar insert
		//$registro_p_i = $this->db->insert('portafolio_imagen', $port_img);
		echo "inserto imagen <br><br>";
	}

}