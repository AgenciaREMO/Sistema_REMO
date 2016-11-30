<?php
	/**
	* 
	*/
	class cotizaciones extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('cotizacion');
			$this->load->model('concepto');
			$this->load->helper('form');
		}
		public function listaCotizaciones()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$cotizaciones = $this->cotizacion->obtenerCotizaciones();
			$num_total = $this->cotizacion->cotizacionesTotales();
			$num_aceptadas = $this->cotizacion->cotizacionesAceptadas();
			$num_revision = $this->cotizacion->cotizacionesRevision();
			$num_expedidas = $this->cotizacion->cotizacionesExpedidas();
			$num_rechazadas = $this->cotizacion->cotizacionesRechazadas();
			$fecha_actual = date('Y-m-d');
			$num_vencidas= $this->cotizacion->cotizacionesVencidas($fecha_actual);
			$data = array(
				'consulta' => $cotizaciones,
				'num_total' => $num_total,
				'num_aceptadas' => $num_aceptadas, 
				'num_revision' => $num_revision,
				'num_expedidas' => $num_expedidas,
				'num_rechazadas' => $num_rechazadas,
				'num_vencidas' => $num_vencidas
			);

			$this->load->view("cotizaciones/listaCotizaciones", $data);
			$this->load->view("footer");
		}
		public function listaCotizacionesPendientes()
		{
			$this->load->view("head");
			$this->load->view("nav");

			$cotizaciones = $this->cotizacion->obtenerCotizacionesTemp();
			$num_revision = $this->cotizacion->cotizacionesRevision();
			$fecha_actual = date('Y-m-d');
			$data = array(
				'consulta' => $cotizaciones,
				'num_revision' => $num_revision,
			);

			$this->load->view("cotizaciones/listaCotizacionesPendientes", $data);
			$this->load->view("footer");
		}
		public function cotizacionNueva()
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$resultado = $this->cotizacion->obtenerPersonal();
			$datos = $this->cotizacion->obtenerProyectos();
			$consid = $this->cotizacion->obtenerElemento(1);
			$entreg = $this->cotizacion->obtenerElemento(2);
			$for_pago = $this->cotizacion->obtenerElemento(3);
			$tiempo_entrega = $this->cotizacion->obtenerElemento(4);
			$reque = $this->cotizacion->obtenerElemento(5);
			$descrip = $this->concepto->obtenerConceptos();
			$num_cotizacion = $this->cotizacion->obtenerUltimoFolio();

			$data = array(
				'consulta' => $resultado,
				'proyectos' => $datos,
				//'descripciones' => $descrip,
				'consideraciones' => $consid, 
				'entregables' => $entreg,
				'forma_pago' => $for_pago,
				'tiempo_entrega' => $tiempo_entrega,
				'requerimientos' => $reque,
				'num_cotizacion' => $num_cotizacion
			);

			$this->load->view("cotizaciones/cotizacion_nueva", $data);
			$this->load->view("footer");
		}

		public function mostrarBusqueda()
		{
			if($this->input->is_ajax_request())
			{
				$buscar = $this->input->post("buscar");
				$tipo_bus = $this->input->post("tipo_busqueda");
				$busquedainf = $this->input->post("busqueda_inf");
				$busquedasup = $this->input->post("busqueda_sup");
				if ($tipo_bus == "b-personal") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-proyecto") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-folio") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-empresa") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-importeinf") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-importesup") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-importes") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-todos") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-expedicioninf") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-expedicionsup") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-expediciones") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-vigenciainf") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-vigenciasup") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}
				else if ($tipo_bus == "b-vigencias") {
					$datos = $this->cotizacion->mostrarBusquedaCotizaciones($buscar, $tipo_bus, $busquedainf, $busquedasup);
				}

				echo json_encode($datos);
			}
			else
			{
				show_404;
			}
		}
		public function mostrarFiltro()
		{
			if($this->input->is_ajax_request())
			{
				$filtro = $this->input->post("filtro");
				if ($filtro == "f-aceptada") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-expedida") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-rechazada") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-revision") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-vencida") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				else if ($filtro == "f-total") {
					$datos = $this->cotizacion->mostrarFiltroCotizaciones($filtro);
				}
				echo json_encode($datos);
			}
			else
			{
				show_404;
			}
		}

		public function mostrarProyecto($id = '')
		{
			if($this->input->is_ajax_request())
			{
				$data = $this->cotizacion->mostrarProyecto($id);
				echo json_encode($data);
			}
			else
			{
				show_404;
			}
		}
		public function mostrarDescripcion($id = '')
		{
			if($this->input->is_ajax_request())
			{
				$tipo = "cotizacion";
				$data = $this->concepto->obtenerDescripcionPorId($id, $tipo);
				echo json_encode($data);
			}
			else
			{
				show_404;
			}
		}
		public function descripcionesAjax($id = '')
		{
			if($this->input->is_ajax_request())
			{
				$data = $this->cotizacion->obtenerDescripcionesTipoProyecto($id);
				echo json_encode($data);
			}
			else
			{
				show_404;
			}
		}
		public function recibirDatosCotizacion()
		{
			$data = array(
				'id_proyecto' => $this->input->post('id_proyecto'),
				'id_personal' => $this->input->post('personal'),
				'f_generacion' => date('Y-m-d'),
				'cantidades' => $this->input->post('cantidades'),
				'descripciones' => $this->input->post('descripciones'),
				'horas' => $this->input->post('horastot'),
				'comentario' => $this->input->post('comentario'),
				'elementos' => $this->input->post('elementos')
			);
			//var_dump($data['elementos']); //Imprime el contenido del arreglo y el tipo de datos en cada posición
			$id_insertado = $this->cotizacion->nuevaCotizacionTemp($data);

			redirect('cotizaciones/detallesTemp/'.$id_insertado);
		}
		public function detallesTemp($id = '')
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$consid = $this->cotizacion->obtenerElemento(1);
			$entreg = $this->cotizacion->obtenerElemento(2);
			$for_pago = $this->cotizacion->obtenerElemento(3);
			$tiempo_entrega = $this->cotizacion->obtenerElemento(4);
			$reque = $this->cotizacion->obtenerElemento(5);

			$resultado = $this->cotizacion->obtenerPersonal();
			$fila = $this->cotizacion->obtenerTempPorId($id);
			$desc = $this->cotizacion->obtenerDescripcionesTipoProyecto($fila->id_tipo);
			$elementos = $this->cotizacion->obtenerElementosPorId($id);

			$data = array(
				'consulta' => $resultado,
				'id_temp' => $fila->id_cotizacion_temp,
				'id_personal' => $fila->id_personal,
				'nombre_proyecto' => $fila->proyecto,
				'cliente' => $fila->cliente,			
				'puesto' => $fila->puesto,
				'empresa' => $fila->empresa,
				'f_generacion' => $fila->f_generacion,
				'descripciones' => $fila->descripciones,
				'desc' => $desc,
				'cants' => $fila->cantidades,
				'hors' => $fila->horas,
				'comentario' => $fila->comentario,
				'consideraciones' => $consid, 
				'entregables' => $entreg,
				'forma_pago' => $for_pago,
				'tiempo_entrega' => $tiempo_entrega,
				'requerimientos' => $reque,
				'elementos' => $elementos
			);
			$this->load->view("cotizaciones/editar_cotizacion_temp", $data);
			$this->load->view("footer");
		}
		public function editarTemp($id)
		{
			if ($this->input->post('expedir') == "Expedir")
			{
				$fila = $this->cotizacion->obtenerTempPorId($id);
				$dia = date('j');
				$mes = date('n');
				$anio = date('Y');
				$meses = array(
					'1' => 'Enero',
					'2' => 'Febrero',
					'3' => 'Marzo',
					'4' => 'Abril',
					'5' => 'Mayo',
					'6' => 'Junio',
					'7' => 'Julio',
					'8' => 'Agosto',
					'9' => 'Septiembre',
					'10' => 'Octubre',
					'11' => 'Noviembre',
					'12' => 'Diciembre'
				);
				for ($i=1; $i<13; $i++) { 
					if($mes == $i){ $mes = $meses[$i]; }
				}
				//Generación de folio
				$num_folio = $this->cotizacion->obtenerUltimoFolio();
				$emp = (string) $fila->empresa;
				$emp = strtoupper($emp);
				$nom_proyec = str_split($emp);
				$m = date('m');
				$y = date('y');
				$folio = $nom_proyec[0].$nom_proyec[1].$num_folio->id_cotizacion.$m.$y;
				//Generación de fecha de expedición
				$f_expedicion = date("Y-m-d");
				//Generación de vigencia
				$vigencia = date_create($f_expedicion);
				date_add($vigencia,date_interval_create_from_date_string("30 days"));
				$vigencia = date_format($vigencia,"Y-m-d");
				//Generación de fecha de expedición en formato para el PDF
				$fecha = $dia." de ".$mes." de ".$anio;
				//Generando cadena HTML de descripciones y calculando total
				$descrips = explode(",", $fila->descripciones); 
				$num_descrips = count($descrips);
				$str_descrips = "";
				$cantis = explode(",", $fila->cantidades);
				$hrs = explode(",",$fila->horas);
				$subtotal = 0;

				for($i=0; $i<$num_descrips; $i++){
					$con_desc = $this->cotizacion->obtenerConceptoPorDescripcion($descrips[$i]);
					$importe = $con_desc->costo * $cantis[$i] * $hrs[$i];
					$str_descrips .= "<tr><td style='font-family:Tahoma; padding:3px 3px; text-align:center;'>".$cantis[$i]."</td><td style='font-family:Tahoma; padding:3px 5px;'>".$con_desc->nombre."</td><td style='font-family:Tahoma; padding:3px 5px; '>".$con_desc->detalles."</td><td style='font-family:Tahoma; text-align:right; padding:3px 5px; '>$ ".number_format($importe).".00</td></tr>";
					$subtotal += $importe;
				}

				$iva = ($subtotal * 16)/100;
				$total = $subtotal + $iva;
				//Elementos de seccion seleccionados
				$elementos = $this->cotizacion->obtenerElementosPorId($id);
				$elementos_selec = "";
				$secciones = array(
					'1' => 'CONSIDERACIONES',
					'2' => 'ENTREGABLES',
					'3' => 'FORMAS DE PAGO',
					'4' => 'TIEMPO ESTIMADO DE ENTREGA',
					'5' => 'REQUERIMIENTOS'
				);
				$bandera_cons = false;
				$bandera_entr = false;
				$bandera_pago = false;
				$bandera_tiem = false;
				$bandera_reqs = false;	

				foreach ($elementos->result() as $fila1) {
					if($fila1->id_tipo_seccion == '1'){
					 	if($bandera_cons == false){
					 		$elementos_selec.= "<h4 style='font-family:Tahoma; text-align:justify; font-size:11px; margin-left:163px; margin-bottom:0px'>CONSIDERACIONES:</h4>";
					 		$bandera_cons = true;
					 	}
					 	$elementos_selec.= "<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:3px; margin-left:163px; margin-bottom:0px'>- ".$fila1->descripcion."</p>";
					} 
					else if($fila1->id_tipo_seccion == '2'){
						if($bandera_entr == false){
					 		$elementos_selec.= "<h4 style='font-family:Tahoma; text-align:justify; font-size:11px; margin-left:163px; margin-bottom:0px'>ENTREGABLES:</h4>";
					 		$bandera_entr = true;
					 	}
					 	$elementos_selec.= "<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:3px; margin-left:163px; margin-bottom:0px'>- ".$fila1->descripcion."</p>";						
					} 
					else if($fila1->id_tipo_seccion == '3'){
						if($bandera_pago == false){
					 		$elementos_selec.= "<h4 style='font-family:Tahoma; text-align:justify; font-size:11px; margin-left:163px; margin-bottom:0px'>FORMAS DE PAGO:</h4>";
					 		$bandera_pago = true;
					 	}
					 	$elementos_selec.= "<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:3px; margin-left:163px; margin-bottom:0px'>- ".$fila1->descripcion."</p>";							
					} 
					else if($fila1->id_tipo_seccion == '4'){
						if($bandera_tiem == false){
					 		$elementos_selec.= "<h4 style='font-family:Tahoma; text-align:justify; font-size:11px; margin-left:163px; margin-bottom:0px'>TIEMPO ESTIMADO DE ENTREGA:</h4>";
					 		$bandera_tiem = true;
					 	}
					 	$elementos_selec.= "<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:3px; margin-left:163px; margin-bottom:0px'>- ".$fila1->descripcion."</p>";							
					} 
					else if($fila1->id_tipo_seccion == '5'){
						if($bandera_reqs == false){
					 		$elementos_selec.= "<h4 style='font-family:Tahoma; text-align:justify; font-size:11px; margin-left:163px; margin-bottom:0px'>REQUERIMIENTOS:</h4>";
					 		$bandera_reqs = true;
					 	}
					 	$elementos_selec.= "<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:3px; margin-left:163px; margin-bottom:0px'>- ".$fila1->descripcion."</p>";							
					}
				}

		        //PDF GENERATOR: Load the view and saved it into $html variable
		        $html = 
		        "<style>
		        	@page {
		        	    background-image: url(".base_url()."/img/machoteRemoBco.jpg);
					    margin-top:50px;
					    background-image-resize:6;
					}
					table, th, td {
					    border:1px solid black;
					    border-collapse:collapse;
					}
				</style>".
		        "<body>
		        	<div>
						<p style='font-family:Tahoma; color:#FFF; text-align:right; font-size:20px; margin-bottom:35px;'><i>COTIZACIÓN</i></p>
		        		<p style='font-family:Tahoma; text-align:right; font-size:12px;'>Santiago de Querétaro, Qro., a ".$fecha."<br>
		        		<b style='font-family:Tahoma; color:#0f76bb;'> COTIZACIÓN ".$folio."</b></p>
		        	</div>
		        	<div>
			        	<p style='font-family:Tahoma; text-align:left; font-size:11px; margin-top:28px; margin-left:163px;'><b>".$fila->cliente."</b><br>
			        	".$fila->puesto."<br>
			        	Presente.</p>
		        	</div>
			        <p style='font-family:Tahoma; color:#0f76bb; text-align:left; font-size:12px; position:absolute; top:228px; left:220px;'><b>PROYECTO: ".strtoupper($fila->proyecto)."</b></p>
		        	<div>
						<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:47px; margin-left:163px; margin-bottom:0px'>
							Por este medio, nos permitimos presentar a su atenta consideración la cotización de la impresión de folders y tarjetas de presentación, como fue solicitada por usted.
						</p>
						<h4 style='font-family:Tahoma; text-align:justify; font-size:11px; margin-left:163px; margin-bottom:0px;'>DESCRIPCIÓN DEL PROYECTO</h4>
						<table style='margin-top:3px; margin-left:163px; font-size:11px;'>
							<tr>
								<th style='font-family:Tahoma; width:43px; padding:4px 0px; background-color:#efefef'>CANT.</th>
								<th style='font-family:Tahoma; width:128px; padding:4px 0px; background-color:#efefef'>CONCEPTO</th>
								<th style='font-family:Tahoma; width:240px; padding:4px 0px; background-color:#efefef'>DESCRIPCIÓN</th>
								<th style='font-family:Tahoma; width:87px; padding:4px 0px; background-color:#efefef'>IMPORTE</th>
							</tr>".$str_descrips."
							<tr>
								<td colspan='3' style='font-family:Tahoma; font-size:11px; padding:3px 5px; text-align:right; background-color:#efefef'>
									<b>
										SUBTOTAL:<br>
										IVA:<br>
										TOTAL:
									</b>
								</td>
								<td style='font-family:Tahoma; font-size:11px; padding:3px 5px; text-align:right;'>
									<b>
										$ ".number_format($subtotal).".00<br>
										$ ".number_format($iva).".00<br>
										$ ".number_format($total).".00
									</b>
								</td>
							</tr>
						</table>
		        	</div>
		        	<div>
						<p style='font-family:Tahoma; text-align:justify; font-size:11px; margin-top:10px; margin-left:163px; margin-bottom:0px;'>
							*Estos costos están sujetos a cambio en caso de existir modificaciones en las características del proyecto. El IVA se muestra en el precio final.<br>
							La entrega de avances y proyecto final están sujetos al tiempo de aprobación por parte del cliente.<br>
							Una modificación o adición de contenido no mencionado en la descripción del proyecto implica un costo extra.
						</p>
					</div>
					<div>".
						$elementos_selec
					."</div>
					<div style='margin-top:15px;'>
						<h4 style='font-family:Tahoma; text-align:center; font-size:11px; margin-left:163px; margin-bottom:0px;'>ATENTAMENTE:</h4>
						<p style='text-align:center; margin-left:163px;'><img src='".base_url()."/img/firma.png'></p>
						<p style='font-family:Tahoma; text-align:center; font-size:11px; margin-left:163px; margin-bottom:0px;'>
							JUAN CARLOS REYES GARCÍA<br>
							Director de Estrategia e Inovación
						</p>
					</div>
					<div style='position:absolute; margin-left:-30px; left:50%; bottom:60px;'>
						 <p style='font-family:Tahoma; color:#0f76bb; text-align:center; font-size:11px;'><i>Tel. 5 27 02 02 &nbsp; &nbsp; &nbsp; <b>www.remo.mx</b></i></p>
					</div>
		        </body>";

		        //Asignación de ubicación y nombre del archivo
		        $pdfFilePath = "pdf-cotizaciones/cotizacion_".$folio.".pdf";
		 
		        //Se carga mPDF libreria
		        $this->load->library('M_pdf');
		        $mpdf = new mPDF();
		 
		       	//Generación del PDF apartir de la cadena html
		        $mpdf->WriteHTML($html);

		 		//Se almacena.
		     	$mpdf->Output($pdfFilePath, "F");

		        //Cotizacion fija es dada de alta
				$data = array(
					'id_proyecto' => $fila->id_proyecto,
					'id_personal' => $fila->id_personal,
					'folio' => $folio,
					'f_expedicion' => $f_expedicion,
					'f_generacion' => $fila->f_generacion,
					'vigencia' => $vigencia,
					'total' => $this->input->post('totalcot'),
					'comentario' => $this->input->post('comentario'),
					'url' =>  $pdfFilePath,
					'id_temp' => $id, 
					'total' => $total,
					'comentario' => $fila->comentario
				);
				$id_insertado = $this->cotizacion->nuevaCotizacionFija($data);
				
				redirect('cotizaciones/detallesCotiz/'.$id_insertado);
			}
			else if($this->input->post('guardar') == "Guardar")
			{
				$elementos = $this->input->post('elementos');
				if (empty($elementos)) {
					$elementos = array();
				}

				$data = array(
					'id_personal' => $this->input->post('personal'),
					'cantidades' => $this->input->post('cantidades'),
					'descripciones' => $this->input->post('descripciones'),
					'horas' => $this->input->post('horastot'),
					'comentario' => $this->input->post('comentario'),
					'elementos' => $this->input->post('elementos'),
					'id_temp' => $id
				);
				$this->cotizacion->editarTemp($data);

				redirect('cotizaciones/detallesTemp/'.$id);
			}
		}
		public function detallesCotiz($id)
		{
			$this->load->view("head"); 
			$this->load->view("nav");

			$fila = $this->cotizacion->obtenerCotizPorId($id);

			$data = array(
				'id_cotiz' => $fila->id_cotizacion
			);
			$this->load->view("cotizaciones/detalles_cotizacion_fija", $data);
			$this->load->view("footer");

		}
		public function detallesCotizacionAjax($id = '')
		{
			$data = $this->cotizacion->obtenerCotizacionPorId($id);

			echo json_encode($data);
		}
		public function detallesTemporalAjax($id = '')
		{
			$data = $this->cotizacion->obtenerTempPorId($id);

			echo json_encode($data);
		}

		public function eliminarCotizacion($id)
		{
			$this->cotizacion->eliminarCotizacion($id);
			redirect('cotizaciones/listaCotizaciones');
		}
		public function eliminarTemporal($id)
		{
			$this->cotizacion->eliminarTemporal($id);
			redirect('cotizaciones/listaCotizaciones');
		}
	}
?>