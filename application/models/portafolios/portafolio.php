<?php
/*
//Documento: Modelo del módulo de portafolios personalizados
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 09 de Marzo del 2016
//Fecha de modificación: 
*/
class Portafolio extends CI_Model
{
	//Función que permite mostrar en una vista los portafolios existentes.
	public function mostrarPortafolio()
	{
		/*
		//SELECT * FROM portafolio
		*/
		return $this->db->get('portafolio');
	}
	//Función que permite obtener toda la información de los portafolios.
	public function obtenerPortafolio()
	{
		/*
		//SELECT por.id_portafolio, por.id_proyecto, por.comentario, porti.id_por_tip, porti.id_tipo, porpe.id_por_per, porpe.id_personal, porpe.destacado, porpe.seleccion, 
			     porim.id_por_ima, porim.id_img, img.id_tipo_img, img.nom_img, img.url_img, tim.nom_tipo
		  FROM portafolio as por
		  INNER JOIN portafolio_tipo as porti
		  ON por.id_portafolio = porti.id_portafolio
		  INNER JOIN portafolio_personal as porpe
		  ON por.id_portafolio = porpe.id_portafolio
		  INNER JOIN portafolio_imagen as porim
		  ON por.id_portafolio = porim.id_portafolio
		  INNER JOIN imagen as img
		  ON porim.id_img = img.id_img
		  INNER JOIN tipo_imagen as tim
		  ON img.id_tipo_img = tim.id_tipo_img
		  */
		$this->db->select('por.id_portafolio, 
						   por.id_proyecto,    
						   por.comentario, 
						   porti.id_por_tip, 
						   porti.id_tipo, 
						   porpe.id_por_per, 
						   porpe.id_personal, 
						   porpe.destacado, 
						   porpe.seleccion, 
						   porim.id_por_ima, 
						   porim.id_img,
					       img.id_tipo_img,
					       img.nom_img,
					       img.url_img, 
					       tim.nom_tipo
						');
		$this->db->from('portafolio as por');
		$this->db->join('portafolio_tipo as porti', 'por.id_portafolio = porti.id_portafolio');
		$this->db->join('portafolio_personal as porpe', 'por.id_portafolio = porpe.id_portafolio');
		$this->db->join('portafolio_imagen as porim', 'por.id_portafolio = porim.id_portafolio');
		$this->db->join('imagen as img', 'porim.id_img = img.id_img');
		$this->db->join('tipo_imagen as tim', 'tipo_imagen as tim');
		$query = $this->db->get();
	}
	//Función que permite insertar una nueva imagen al sistema de base de datos.
	public function insertarPortafolio($inputs)
	{
		 $p = $this->db->insert('portafolio', $inputs);
		 $id_portafolio = $this->db->insert_id();
		 return $id_portafolio; //Recuperamos el id del último insert
		 echo $p ;
	}

	//Función que permite enviar el portafolio a tráves de correo electrónico.
	public function cancelarPortafolio($id_p)
	{	

		$this->db->where('id_portafolio', $id_p); //Decimos que obtenga el registro que sea igual el id al que recupero
   		$this->db->delete('portafolio'); //Eliminamos el id que es igual al recuperado
	}
	public function obtenerPortafolioPorId($Id = ''){
			$resultado = $this->db->query("SELECT * FROM portafolio WHERE id_portafolio = '" . $Id . "' LIMIT 1");
			return $resultado->row(); //Convierte el resultado de la consulta a una fila
	}
	//Función que permite eliminar portafolios de base de datos.
	public function eliminarPortafolio($id){
		$this->db->delete('portafolio', array('id_portafolio' => $id));
	}

	/*
	---------FUNCIONES QUE RECUPERAN LA INFORMACIÓN QUE CONTENDRÁ EL PORTAFOLIO--------
	*/
	//Función que permite obtener la portada que se eligio para determinado portafolio
	public function consultaPortada($data){
		/*SELECT * FROM portafolio_imagen 
		  INNER JOIN imagen 
		  ON portafolio_imagen.id_img = imagen.id_img 
		  INNER JOIN tipo_imagen
		  ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
		  WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 1 LIMIT 1*/

		  $this->db->select('*');
		  $this->db->from('portafolio_imagen');
		  $this->db->join('imagen','portafolio_imagen.id_img = imagen.id_img');
		  $this->db->join('tipo_imagen','tipo_imagen.id_tipo_img = imagen.id_tipo_img');
		  $this->db->where('portafolio_imagen.id_portafolio', $data["id_portafolio"]);
		  $this->db->where('imagen.id_tipo_img', 1);
		  $this->db->limit(1);
		  $portada = $this->db->get();
		  return $portada->row(); 
	}
	//Función que permite obtener los servicios que se eligieron para determinado portafolio
	public function consultaServicios($data){
		/*
		SELECT * FROM portafolio_tipo
		INNER JOIN tipo_proyecto
		ON portafolio_tipo.id_tipo = tipo_proyecto.id_tipo
		WHERE portafolio_tipo.id_portafolio = $data['id_portafolio'] 
		LIMIT 4
		*/
		$this->db->select('*');
		$this->db->from('portafolio_tipo');
		$this->db->join('tipo_proyecto','portafolio_tipo.id_tipo = tipo_proyecto.id_tipo');
		$this->db->where('portafolio_tipo.id_portafolio',  $data['id_portafolio']);
		$this->db->limit(4);
		$servicios = $this->db->get();
		 return $servicios->row();
	}
	//Función que permite obtener los miembros del equipo a integrar en el portafolio
	public function consultaPersonal($data){
		/*
		SELECT * FROM portafolio_personal
		INNER JOIN personal
		ON portafolio_personal.id_personal = personal.id_personal
		WHERE portafolio_personal.id_portafolio = $data['id_portafolio']
		*/
		$this->db->select('*');
		$this->db->from('portafolio_personal');
		$this->db->join('personal','portafolio_personal.id_personal = personal.id_personal');
		$this->db->where('portafolio_personal.id_portafolio',  $data['id_portafolio']);
		$this->db->limit('4');
		$personal = $this->db->get();
		return $personal->row();
	}
	//Función que permite obtener el slide que se integrará al portafolio 
	public function consultaSlidePersonal($data){
		/*
		SELECT * FROM portafolio_imagen 
		INNER JOIN imagen 
		ON portafolio_imagen.id_img = imagen.id_img 
		INNER JOIN tipo_imagen
		ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
		WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 2
		*/
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen','imagen.id_img = tipo_imagen.id_img');
		$this->db->join('tipo_imagen','imagen.id_tipo_img = tipo_imagen.id_img');
		$this->db->where('portafolio_imagen.id_portafolio', $data['id_portafolio']);
		$this->db->where('imagen.id_tipo_img', 2);
		$this->db->limit(1);
		$sliderPersonal = $this->db->get();
		return $sliderPersonal->row();

	}
	//Función que permite obtener la experiencia seleccionada para el portafolio
	public function consultaExperiencia($data){
		/*
		SELECT * FROM portafolio_imagen 
		INNER JOIN imagen 
		ON portafolio_imagen.id_img = imagen.id_img 
		INNER JOIN tipo_imagen
		ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
		WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 3
		*/	
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen','imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $data['id_portafolio']);
		$this->db->where('imagen.id_tipo_img', 3);
		$this->db->limit('12');
		$experiencia = $this->db->get();
		return $experiencia->row();

	}
	//Función que permite obtener el contenido gráfico seleccionado para el portafolio
	public function consultaGrafico($data){
		/*
		SELECT * FROM portafolio_imagen 
		INNER JOIN imagen 
		ON portafolio_imagen.id_img = imagen.id_img 
		INNER JOIN tipo_imagen
		ON imagen.id_tipo_img  = tipo_imagen.id_tipo_img
		WHERE portafolio_imagen.id_portafolio = $data['id_portafolio'] AND imagen.id_tipo_img = 4
		*/	
		$this->db->select('*');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('portafolio_imagen.id_portafolio', $data['id_portafolio']);
		$this->db->where('imagen.id_tipo_img', 4);
		$this->db->limit('3');
		$grafico = $this->db->get();
		return $grafico->row();
	}
}

?>