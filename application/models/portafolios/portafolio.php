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
	//Función que permite eliminar portafolios de base de datos.
	public function eliminarPortafolio()
	{

	}

}

?>