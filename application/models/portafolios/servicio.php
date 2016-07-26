<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de seccion de serivio de portafolios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 04 Abril del 2016
//Fecha de modificación: 
*/
/**
* 
*/
class Servicio extends CI_Model
{

public function consultarServicio()
{
	//	SELECT * FROM portafolio_tipo RIGHT JOIN tipo_proyecto ON portafolio_tipo.id_tipo =tipo_proyecto.id_tipo
	$this->db->select('*');
	$this->db->from('portafolio_tipo');
	$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo', 'right');
	$query = $this->db->get();
		if($query->num_rows()>0){
			return $query;
		}
}


	//Función que permite consultar si existe un registro en la tabla portafolios-tipo para evaluar
	public function obtenerServicio($id){
		/*
		//SELECT * FROM portafolio_tipo INNER JOIN tipo_proyecto ON portafolio_tipo.id_tipo = tipo_proyecto.id_tipo	WHERE portafolio_tipo.id_portafolio = $id['id_portafolio']
		*/
		$this->db->select('*');
		$this->db->from('portafolio_tipo');
		$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo');
		$this->db->where('portafolio_tipo.id_portafolio', $id['id_portafolio']);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query;
			/*
			SELECT pt.id_portafolio, pt.id_tipo FROM portafolio_tipo pt INNER JOIN tipo_proyecto tp ON pt.id_tipo = tp.id_tipo WHERE pt.id_portafolio = $id['id_portafolio']
			
			$this->db->select('*');
			$this->db->from('portafolio_tipo');
			$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo','inner');
			$this->db->where('portafolio_tipo.id_portafolio', $id['id_portafolio']);
			$query = $this->db->get();
			if($query->num_rows()>0){
	        	return $query;
	      	}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Modificar';*/
      	}else{
      		return false;
         	/*
			//$query = $this->db->query('select * from tipo_proyecto ORDER BY `id_tipo` ASC');
			
			$this->db->select('*');
			$this->db->from('portafolio_tipo');
			$this->db->join('tipo_proyecto', 'portafolio_tipo.id_tipo = tipo_proyecto.id_tipo', 'right');
			$query = $this->db->get();
				if($query->num_rows()>0){
					return $query;
				}else{
	        	return false;
	      	} 
	      	print_r($query);
	      	echo 'Insertar';  */  	
      	}

	}




public function insertarServicio($data, $descripcion, $tipo, $cont){
	$arrayCont = explode (", " , $cont['id_tipo']);
	for($i=0; $i <= count($arrayCont) ;$i++) {
		if(!empty($tipo['id_tipo'][$i])){
			$sql = " INSERT INTO portafolio_tipo (id_por_tip, id_tipo, id_portafolio, desc_ser) 
				     VALUES ('',".$tipo['id_tipo'][$i].",".$data['id_portafolio'].",'".$descripcion['descripcion'][$i]."')";
			$this->db->query($sql);
			echo '<br><br>';
		}else{
		}
	  echo $sql;
	  echo "<br><br>";   
	}
}

public function actualizarServicio($data, $descripcion, $tipo, $cont){
	/*
	UPDATE portafolio_tipo
	SET desc_ser='Probando una nueva descripcion'
	WHERE id_portafolio = 9 AND id_tipo = 2;
	*/
	$arrayCont = explode (", " , $cont['id_tipo']);
	for($i=0; $i <= count($arrayCont) ;$i++) {
		if(!empty($tipo['id_tipo'][$i])){
			/*
			$sql = " UPDATE portafolio_tipo 
				     SET id_tipo = ".$tipo['id_tipo'][$i].", desc_ser= '".$descripcion['descripcion'][$i]."'".
				     "WHERE id_portafolio = ".$data['id_portafolio']" and ";
				     $this->db->query($sql);
			*/

			$this->db->where('id_portafolio', $port_img['id_portafolio']);
			$this->db->where('id_tipo', $tipo['id_tipo'][$i]);
			$sql = $this->db->update('portafolio_tipo', array('desc_ser' => $descripcion['descripcion'][$i]));
			
			echo '<br><br>';
		}else{
		}
	  echo $sql;
	  echo "<br><br>";   
	}
}


	//$sqlq="";

  	//for($i=0; $i < count($tipo) ;$i++) {
	
		
	      /* $sqlq.="INSERT INTO portafolio_tipo (id_por_tip, id_tipo, id_portafolio, descripcion) VALUES ";
	       $sqlq.="('', ".serialize($tipo).",".$data['id_portafolio'].", '".serialize($descripcion)."');";
	       //$sqlq.="('', ".serialize($tipo['id_tipo']).",".$data['id_portafolio'].", '".serialize($descripcion['descripcion'])."');";
		   //$sqlq.="('', ".$tipo[$i].",".$id_po.", '".$descripcion[$i]."');";
	       echo "<br><br> El se genera segun el numero que salga y como sale uno pues solo me imprime este pero debería imprimir 4
	       		 <br><br>Otro detalle es el arreglo evidentmente no se esta pasando adecuadamente a la query pero es ahi donde no encuentro solución :/<br><br>";
	       echo $sqlq;
	       $insertSQL = $this->db->query($sqlq); */
	       /*if($sqlq ){
	       	$insertSQL = $this->db->query($sqlq); 
	       	echo 'Se subio';
	       }else{
	       	echo "No se subió";
	       }*/
	      



public function insertarServicios($data){
		//Comentar insert
		$registro_p_i = $this->db->insert('portafolio_imagen', $port_img);
	}

	public function editarServicio($port_img){
		//Comentar update
		$this->db->where('id_portafolio', $port_img['id_portafolio']);
		$this->db->update('portafolio_imagen', array('id_img' => $port_img['id_img']));
	}


	public function actualizarServiciosw($port_img){
		/*select *
		from portafolio_imagen
		inner join imagen
		on portafolio_imagen.id_img = imagen.id_img
		inner join tipo_imagen
		on imagen.id_tipo_img = tipo_imagen.id_tipo_img
		where tipo_imagen.id_tipo_img = 1 and portafolio_imagen.id_portafolio = 9
		*/
		//Consulta si existe un registro de un portafolio relacionado con una imagen tipo portada
		$this->db->select('portafolio_imagen.id_portafolio');
		$this->db->from('portafolio_imagen');
		$this->db->join('imagen', 'portafolio_imagen.id_img = imagen.id_img');
		$this->db->join('tipo_imagen', 'imagen.id_tipo_img = tipo_imagen.id_tipo_img');
		$this->db->where('tipo_imagen.id_tipo_img', 1);
		$this->db->where('portafolio_imagen.id_portafolio', $port_img['id_portafolio']);
		$query = $this->db->get();
		if($query->num_rows()>0){	//Si existe hace un update
			$this->editarPortada($port_img);
		}else{ //Si no existe hace un insert
			$this->insertarPortada($port_img);
		}
	}

}


?>