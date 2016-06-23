<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Cotización Nueva</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li class="active">Cotizaciones</li>
			  <li><a href="<?= base_url()?>cotizaciones/listaCotizaciones">Gestor de Cotizaciones</a></li>
			  <li class="active">Cotización</li>
			</ol>
			<hr>
			<?= form_open('/cotizaciones/recibirDatosCotizacion') ?>
			<?php
				$style = 'class="form-control"';
				//Select
				$personal = array();
				foreach ($consulta->result() as $fila) 
				{
					$personal[$fila->id_personal] = $fila->nombre;
				}
				//Inputs
				$cantidad0 = array(
					'name' => 'cantidad0',
					'class' => 'form-control input-recal',
					'value' => '1',
					'id' => 'cantidad0'
				);
				$concepto0 = array(
					'name' => 'concepto0',
					'class' => 'form-control',
					'placeholder' => '---',
					'id' => 'concepto0'
				);
				$descripcion0 = array(
					'name' => 'descripcion0',
					'class' => 'form-control',
					'placeholder' => '---',
					'id' => 'descripcion0',
					'disabled' => 'disabled'
				);
				$horas0 = array(
					'name' => 'horas0',
					'class' => 'form-control input-recal',
					'value' => '1',
					'id' => 'horas0'
				);
				$importe0 = array(
					'name' => 'importe0',
					'class' => 'form-control',
					'placeholder' => '0',
					'id' => 'importe0'
				);
				//Botón
				$guardar = array(
					'class' => 'btn btn-primary',
					'value' => 'Guardar'
				);
			?>
				<h3>Información General</h3>
				<div class="col-lg-12 text-right">
					<?php 
						$dia = date('j');
						$mes = date('n');
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
							if($mes == $i){$mes = $meses[$i];}
						}
						$anio = date('Y');
						$fecha = $dia." de ".$mes." de ".$anio;
						echo "<p>Santiago de Querétaro, Qro., a ".$fecha."</p>";
					?>
					<?= form_label('COTIZACIÓN: XXXXXXXXXX') ?> 
				</div>
				<div class="form-group">
					<?= form_label('Elaborada por', 'personal') ?>
					<?= form_dropdown('personal',$personal,'1', $style) ?>
				</div>
				<div class="form-group" id="divproyecto">
					<label><a href="" data-toggle="modal" data-target="#modal_proyecto"> Proyecto <i class="fa fa-search" aria-hidden="true"></i></a></label>
				</div>
				<h3>Descripción del proyecto</h3>
				<div class="form-group" id="divdescrip">
					<table id="tabla-conceptos" class="table table-hover">
						<tr>
							<th></th>
							<th class="col-cantidad">Cant.</th>	
							<th>Concepto</th>
							<th>Descripción</th>
							<th class="col-horas">Horas</th>
							<th class="col-importe">Importe</th>
						</tr>
						<tr>
							<td><a class="i-borrar" href="#" onclick=""><i class="fa fa-times"></i></a></td>
							<td class="col-cantidad"><?= form_input($cantidad0) ?></td>
							<td class="col-concepto">
								<div class="input-group">
									<?= form_input($concepto0) ?>
							    	<div class="input-group-addon">
							    			<i class="fa fa-search" aria-hidden="true" onclick="identificar_Concepto('0')"></i>
							    	</div>
							    </div>
							</td>
							<td class="col-descripcion"><?= form_input($descripcion0) ?></td>
							<td class="col-horas">
								<div class="input-group">
									<?= form_input($horas0) ?>
							    	<div class="input-group-addon"> x $<span name="costo0" id="costo0">0.00</span></div>
							    </div>
							</td>
							<td class="col-importe">
								<div class="input-group">
									<span id="importe0"name="importe0"></span>
								</div>
							</td>
						</tr>
					</table>				
					<a href="#" class="btn btn-default" onClick="agregarConcepto()">Agregar Concepto <i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				<hr>
				<?= form_submit($guardar) ?>
				<a href="<?= base_url('cotizaciones/listaCotizaciones') ?>" class="btn btn-default">Cancelar</a>
			<?= form_close() ?>
		</div>
	</div>
</div>

<!-- Modal proyecto -->
<div class="modal fade" id="modal_proyecto" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">Selecciona el proyecto</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="formproy" class="form-horizontal">
					<table id="proys" class="table table-hover"><thead><tr><th></th><th>Proyecto</th><th>Empresa</th></tr></thead><tbody>
					<?php 
						//$i = 1;
						foreach ($proyectos->result() as $fila) 
						{ ?>
							<tr>
								<td><?php echo form_radio("proyecto", $fila->id_proyecto, FALSE) ?></td>
								<td><?= $fila->nombre ?></td>
								<td><?= $fila->empresa ?></td>
							</tr>
						<?php /*$i++;*/ } ?>
					</tbody></table>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="#" class="btn btn-danger" id="seleccionarProy" data-dismiss="modal">Seleccionar</a>
	      	</div>
    	</div>
  	</div>
</div>

<!-- Modal conceptos y descripciones -->
<div class="modal fade" id="modal_concepto" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">Selecciona el proyecto</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="formconcep" class="form-horizontal">
					<table id="concep" class="table table-hover"><thead><tr><th></th><th>Concepto</th><th>Descripción</th><th>Costo por hora</th><th>Categoría</th></tr></thead><tbody>
					<?php 
						//$i = 1;
						foreach ($descripciones->result() as $fila) 
						{ ?>
							<tr>
								<td><?php echo form_radio("descripcion", $fila->id_descripcion, FALSE) ?></td>
								<td><?= $fila->concepto ?></td>
								<td><?= $fila->detalles ?></td>
								<td><?= $fila->costo ?></td>
								<td><?= $fila->tipo ?></td>
							</tr>
						<?php /*$i++;*/ } ?>
					</tbody></table>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="#" class="btn btn-danger" id="seleccionarDescrip" data-dismiss="modal">Seleccionar</a> <input type="hidden" value="" id="inputs" name="inputs">
	      	</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
	//Variables globales
	var num_concep = 1;
	
	$(document).ready(function() {
    	$('#proys').find('tr').click(function() {
    		$(this).find('input').prop("checked", true);
    		var id = $('input:radio[name=proyecto]:checked').val();
    		$('#seleccionarProy').attr("onClick", "cargarProyecto('"+id+"')");

    	});
    	$('#concep').find('tr').click(function() {
    		$(this).find('input').prop("checked", true);
    		var id = $('input:radio[name=descripcion]:checked').val();
    		var num_input = $("#inputs").val();
    		$('#seleccionarDescrip').attr("onClick", "cargarDescrip('"+id+"','"+num_input+"')");
    	});
    	$("body").on("keyup", "input[name*='cantidad']", function() {
    		var txt = $(this).attr("id");
			var id_input = txt.replace(/\D/g,'');
			recalcularImporte(id_input);
    	});
    	$("body").on("keyup", "input[name*='horas']", function() {
    		var txt = $(this).attr("id");
			var id_input = txt.replace(/\D/g,'');
			recalcularImporte(id_input);
    	});
    	//Limpia la modales cuando se ocultan
		$(document.body).on('hidden.bs.modal', function () {
			$('#formproy')[0].reset();
			$('#formconcep')[0].reset();

		});

    });
	function cargarProyecto(id)
	{
		$.ajax({
			url: "<?= base_url('cotizaciones/mostrarProyecto') ?>" + "/" + id, 
			type: "GET",
			dataType: "JSON",
			success: function(data){
				var registro = eval(data);
				html = "<label><a href='' data-toggle='modal' data-target='#modal_proyecto'>Proyecto</a></label><br>";
				html += "<div class='row'><div class='col-lg-12'><p><label>Nombre del Proyecto:</label> "+registro[0]["nombre"]+"</p></div></div>";
				html += "<div class='row'><div class='col-lg-6'><p><label>Cliente:</label> "+registro[0]["cliente"]+" ("+registro[0]["puesto"]+")</p></div>";
				html += "<div class='col-lg-6'><p><label>Empresa:</label> "+registro[0]["empresa"]+"</p></div></div>";
				$("#divproyecto").html(html);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
	function cargarDescrip(id, num)
	{
		$.ajax({
			url: "<?= base_url('cotizaciones/mostrarDescripcion') ?>" + "/" + id, 
			type: "GET",
			dataType: "JSON",
			success: function(data){
				var registro = eval(data);
				var num = parseInt($("#inputs").val());
				//var id = this.id;
				//$('#' + id).hide();
				$("#concepto" + num).val(registro[0]["concepto"]);
				$("#descripcion" + num).val(registro[0]["detalles"]);
				$("#costo" + num).text(registro[0]["costo"]);
				var cantidad = parseInt($("#cantidad" + num).val());
				var horas = parseInt($("#horas" + num).val());
				var costo = parseInt($("#costo" + num).text());
				var importe = cantidad * costo * horas;
				$("#importe" + num).text(importe);

				//$("#divdescrip").html(html);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
	function recalcularImporte(id)
	{
		if ($("#horas" + id).val().length < 1) 
		{
			$("#horas" + id).val("0");
		}
		else if($("#cantidad" + id).val().length < 1)
		{
			$("#cantidad" + id).val("0");
		}
		var cantidad = parseInt($("#cantidad" + id).val());
		var horas = parseInt($("#horas" + id).val());
		var costo = parseInt($("#costo" + id).text());
		var importe = cantidad * costo * horas;
		$("#importe" + id).text(importe);
		alert("cant:" + cantidad + "costo:" + costo + "horas:" + horas + "importe:" + importe);
	}
	function identificar_Concepto(num)
	{
		$("#inputs").val(num);
		$('#modal_concepto').modal('show');
	}
	function agregarConcepto()
	{
		html = "<tr><td><a class='i-borrar' href='#' onclick=''><i class='fa fa-times'></i></a></td><td class='col-cantidad'><input type='text' name='cantidad"+num_concep+"' class='form-control input-recal' value='1' id='cantidad"+num_concep+"'></td><td class='col-concepto'><div class='input-group'><input type='text' name='concepto"+num_concep+"' class='form-control'	placeholder='---' id='concepto"+num_concep+"'><div class='input-group-addon'><i onClick='identificar_Concepto("+num_concep+")' class='fa fa-search' aria-hidden='true'></i></div></div></td><td class='col-descripcion'><input type='text' name='descripcion"+num_concep+"' class='form-control' placeholder='---' id='descripcion"+num_concep+"' disabled='disabled'></td><td class='col-horas'><div class='input-group'><input type='text' name='horas"+num_concep+"' class='form-control input-recal' value='1' id='horas"+num_concep+"'><div class='input-group-addon'> x $<span name='costo' id='costo"+num_concep+"'>0.00</span></div></div></td><td class='col-importe'><div class='input-group'><span id='importe"+num_concep+"' name='importe"+num_concep+"'></span></div></td></tr>";
		$("#tabla-conceptos tr:last").after(html);
		num_concep++;
	}
</script>