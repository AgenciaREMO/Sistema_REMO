<?php if ( ! defined('BASEPATH')) exit ('No direct scripts access allowed'); //para que no puedan acceder de manera no controlada directamente al controlador
/*
//Documento: Modelo de serivio de portafolios
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

public function consultarServicios()
{
	//	SELECT * FROM tipo_proyecto
	$this->db->select('*');
	$this->db->from('tipo_proyecto');
	$query = $this->db->get();
		if($query->num_rows()>0){
			return $query;
		}
}

public function insertarServicio($data, $descripcion, $tipo){
	/*$tipo = $tipo;
	$id_po = $id_po;
	$descripcion = $descripcion;*/
	echo "<br><br>";
	echo "Este es el array que busco contar para el for:";
	echo "<br><br>";
	print_r($tipo);
	echo "<br><br>";
	echo "  Aqui deberia arrojar el numero de elementos en el arreglo que debería ser por ahora 4 y sale: " . count($tipo);
	echo "<br><br>";
	print_r($data);
	echo "<br><br>";
	print_r($descripcion);
	echo "<br><br>";
	echo "  Aqui deberia arrojar el numero de elementos en el arreglo que debería ser por ahora 4 y sale: " . count($descripcion);
	echo "<br><br>";
	
	$sqlq="";

  	//for($i=0; $i < count($tipo) ;$i++) {
	for($i=0; $i <= 3 ;$i++) {
		$sql1 = "INSERT INTO portafolio_tipo (id_por_tip, id_tipo, id_portafolio, desc_ser) 
				 VALUES ('',".$tipo['id_tipo'][$i].",".$data['id_portafolio'].",'".$descripcion['descripcion'][$i]."')";
		$this->db->query($sql1);
		echo '<br><br>';
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
	       echo $sql1;
	       
	}	

		

}


public function insertarServicios($data){
		//Comentar insert
		$registro_p_i = $this->db->insert('portafolio_imagen', $port_img);
	}

	public function editarServicio($port_img){
		//Comentar update
		$this->db->where('id_portafolio', $port_img['id_portafolio']);
		$this->db->update('portafolio_imagen', array('id_img' => $port_img['id_img']));
	}


	public function actualizarServicio($port_img){
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