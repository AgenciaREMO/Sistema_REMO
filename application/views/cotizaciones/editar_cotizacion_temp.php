<div class="container" id="container-cotemp">
	<div class="col-12">
		<h2>Editar Cotización Temporal</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  	<li><a href="<?= base_url()?>">Inicio</a></li>
			<li>Cotizaciones</li>
		  	<li><a href="<?= base_url()?>cotizaciones/listaCotizaciones">Gestor de Cotizaciones</a></li>
		  	<li class="active">Cotización</li>
		</ol>
		<hr>
		<?= form_open('cotizaciones/editarTemp/'. $id_temp) ?>
		<?php
			$style = 'class="form-control" disabled="disabled"';
			//Select
			$personal = array();
			foreach ($consulta->result() as $fila) 
			{
				$personal[$fila->id_personal] = $fila->nombre;
			}
			//Botones
			$editar = array(
				'onClick' => 'activarcot()',
				'style' => 'display:inline',
				'class' => 'btn btn-primary',
				'id' => 'e-editar',
				'content' => 'Editar'
			);
			$expedir = array(
				'style' => 'display:inline',
				'class' => 'btn btn-primary',
				'id' => 'e-expedir',
				'name' => 'expedir',
				'value' => 'Expedir'
			);
			$cancelar = array(
				'onClick' => 'desactivarcot()',
				'style' => 'display:none',
				'class' => 'btn btn-default',
				'id' => 'e-cancelar',
				'content' => 'Cancelar'
			);
			$guardar = array(
				'style' => 'display:none',
				'class' => 'btn btn-primary',
				'id' => 'e-guardar',
				'name' =>'guardar',
				'value' => 'Guardar'
			);
		?>
		<h3>Información General</h3>
		<div class="col-lg-12 text-right">
			<?php 
				$fecha_gen = explode("-", $f_generacion, 3);
				$mes = $fecha_gen[1];
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
				$fecha = $fecha_gen[2]." de ".$mes." de ".$fecha_gen[0];
				echo "<p>Santiago de Querétaro, Qro., a ".$fecha."</p>";
			?>
		</div>
		<div class="form-group">
			<?= form_label('Elaborada por', 'personal') ?>
			<?= form_dropdown('personal',$personal,$id_personal, $style) ?>
		</div>
		<div>
			<h3>Proyecto</h3>
			<div class='row'>
				<div class='col-lg-12'>
					<p>
						<label>Nombre del Proyecto:</label><?php echo " " . $nombre_proyecto; ?>
					</p>
						<input type='text' style='display:none' name='id_proyecto' value='"+id+"'>
				</div>
			</div>
		</div>
			<div class='row'>
				<div class='col-lg-6'>
				<p>
					<label>Cliente:</label> <?php echo " " . $cliente . " (" . $puesto . ")"; ?>
				</p>
				</div>
				<div class='col-lg-6'>
					<p><label>Empresa:</label> <?php echo $empresa; ?></p>
				</div>
			</div>
			<div id="descripcion">
				<h3>Descripción del proyecto</h3>
				<div class="form-group" id="divdescrip" >
					<?php 
						$descrips = explode(",", $descripciones); 
						$num_descrips = count($descrips);
						$cantis = explode(",", $cants);
						$hrs = explode(",", $hors);
					?>
					<input type="text" name="cantidades" id="cantidades" style="display:none" value="<?= $cants ?>">
					<input type="text" name="horastot" id="horastot" style="display:none" value="<?= $hors ?>">
					<input type="text" name="descripciones" id="descripciones" style="display:none" value="<?= $descripciones ?>">
					<input type="text" name="totalcot" id="totalcot" style="display:none" value="">
					<table id="tabla-conceptos" class="table table-hover">
						<tr>
							<th></th>
							<th class="col-cantidad">Cant.</th>	
							<th>Concepto</th>
							<th>Descripción</th>
							<th class="col-horas">Horas</th>
							<th class="col-importe">Importe</th>
						</tr>
						<script type="text/javascript">
							//Variables globales
							var num_concep = 0;
						</script>
						<?php 
							/*$descrips = explode(",", $descripciones); 
							$num_descrips = count($descrips);
							$cantis = explode(",", $cants);
							$hrs = explode(",", $hors);YA ESTA ARRIBA*/
							for ($i=0; $i < $num_descrips ; $i++) { 
								foreach ($desc as $fila) {
									if ($descrips[$i] == $fila->id_descripcion) { ?>
										<tr>
											<?php if($i == 0){ ?>
												<td></td>
											<?php } else{?>
												<td> <a class="i-borrar" id="a<?= $i ?>" href='#' onclick="eliminarConcepto(<?= $i ?>)" style="display:none"><i class='fa fa-times'></i></a></td>
											<?php } ?>
											<td class="col-cantidad">
												<input type="text" name="cantidad<?= $i ?>" id="cantidad<?= $i ?>" class="form-control input-recal" value ="<?= $cantis[$i] ?>" disabled="disabled">
											</td>
											<td class="col-concepto">
												<div class="input-group">
													<input type="text" name="concepto<?= $i ?>" id="concepto<?= $i ?>" class="form-control" value="<?= $fila->concepto ?>" disabled="disabled">
													<div class="input-group-addon" id="addon<?= $i ?>" onclick="identificarConcepto(<?= $i ?>)">
														<i class="fa fa-search" aria-hidden="true"></i>
													</div>
												</div>
											</td>
											<td class="col-descripcion">
												<span id="descripcion<?= $i ?>" name="descripcion<?= $i ?>"><?= $fila->detalles ?></span><span id="id_desc<?= $i ?>" name="id_desc<?= $i ?>" style="display:none"><?= $fila->id_descripcion ?></span>
											</td>
											<td class="col-horas">
												<div class="input-group">
													<input type="text" name="horas<?= $i ?>" id="horas<?= $i ?>" class="form-control input-recal" value ="<?= $hrs[$i] ?>" disabled="disabled">
													<div class="input-group-addon"> x $ <span name="costo<?= $i ?>" id="costo<?= $i ?>"><?= $fila->costo ?></span></div>
												</div>
											</td>
											<td class="col-importe">
												<div class="input-group">
													<span id="importe<?= $i ?>"name="importe<?= $i ?>"><?= ($fila->costo)*($cantis[$i])*($hrs[$i]) ?></span>
												</div>
											</td>
										</tr>
									<?php }								
								}?>
								<script type="text/javascript">
									num_concep++;
								</script>
							<?php
							}
						?>						
					</table>
					<div class="col-lg-4">
						<a href="#" id="agregar" class="btn btn-default" onClick="agregarConcepto()" style="display:none">Agregar Concepto <i class="fa fa-plus" aria-hidden="true" ></i></a>
					</div>
					<div class="col-lg-6"></div>
					<div class="col-lg-2">
						<label for="">SUBTOTAL:</label><span name="subtotal" id="subtotal" class="totales">$ 0.00</span><br>
						<label for="">IVA:</label><span name="iva" id="iva" class="totales">$ 0.00</span><br>
						<label for="">*TOTAL:</label><span name="total" id="total" class="totales">$ 0.00</span>
					</div>				
				</div>
				<hr>
				<div id="div-elementos" > 
					<input type="text" name="elementos" id="elementos" style="display:none" value="">
					<!--ELEMENTO DE SECCIÓN CONSIDERACIONES-->
					<div class="row"> 
						<h3>Consideraciones</h3>
						<div class="col-lg-12">
							<?php 
							foreach ($consideraciones->result() as $fila) { 
								$bandera = false;
								foreach ($elementos->result() as $fila1){  
									if ($fila->id_elemento == $fila1->id_elemento) {
										$bandera = true;
									}
								}
								if($bandera == true) {?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" checked disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php } 
								else{?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php
								}
							} ?>
						</div>
					</div>
					<!--ELEMENTO DE SECCIÓN ENTREGABLES-->
					<div class="row">
						<h3>Entregables</h3>
						<div class="col-lg-12">
							<?php
							foreach ($entregables->result() as $fila) {
								$bandera = false; 
								foreach ($elementos->result() as $fila1){  
									if ($fila->id_elemento == $fila1->id_elemento) {
										$bandera = true;
									}
								}
								if($bandera == true) {?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" checked disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php } 
								else{?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php
								}
							} ?>
						</div>
					</div>
					<!--ELEMENTO DE SECCIÓN FORMA DE PAGO-->
					<div class="row">
						<h3>Forma de pago</h3>
						<div class="col-lg-12">
							<?php
							foreach ($forma_pago->result() as $fila) {
								$bandera = false; 
								foreach ($elementos->result() as $fila1){  
									if ($fila->id_elemento == $fila1->id_elemento) {
										$bandera = true;
									}
								}
								if($bandera == true) {?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" checked disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php } 
								else{?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php
								}
							} ?>
						</div>
					</div>
					<!--ELEMENTO DE SECCIÓN FECHAS DE ENTREGA-->
					<div class="row">
						<h3>Tiempo estimado de entrega</h3>
						<div class="col-lg-12">
							<?php
							foreach ($tiempo_entrega->result() as $fila) {
								$bandera = false; 
								foreach ($elementos->result() as $fila1){  
									if ($fila->id_elemento == $fila1->id_elemento) {
										$bandera = true;
									}
								}
								if($bandera == true) {?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" checked disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php } 
								else{?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php
								}
							} ?>
						</div>
					</div>
					<!--ELEMENTO DE SECCIÓN REQUERIMIENTOS-->
					<div class="row">
						<h3>Requerimientos</h3>
						<div class="col-lg-12">
							<?php
							foreach ($requerimientos->result() as $fila) {
								$bandera = false; 
								foreach ($elementos->result() as $fila1){  
									if ($fila->id_elemento == $fila1->id_elemento) {
										$bandera = true;
									}
								}
								if($bandera == true) {?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" checked disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php } 
								else{?>
									<div class="checkbox">
										<input type="checkbox" name="elementos[]" id="check<?= $fila->id_elemento ?>" value="<?php echo $fila->id_elemento ?>" disabled="disabled"><?php echo $fila->descripcion ?>
									</div>
								<?php
								}
							} ?>
						</div>
					</div>
				</div>
				<hr>
				<h3>Comentarios</h3>
				<div class="form-group">
					<textarea name="comentario" class="form-control" rows="5" id="" disabled="disabled"><?php echo $comentario ?></textarea>
				</div>
			</div>
			<?= form_button($editar) ?>
			<?= form_submit($expedir) ?>
			<a id="e-volver" href="<?= base_url('cotizaciones/listaCotizaciones') ?>" class="btn btn-default">Volver</a>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>

<!-- Modal conceptos y descripciones -->
<div class="modal fade" id="modal_concepto" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">Selecciona el concepto</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="formconcep" class="form-horizontal">
					<table id='concep' class='table table-hover'>
						<thead>
							<tr><th></th><th>Concepto</th><th>Descripción</th><th>Costo por hora</th><th>Categoría</th></tr>
						</thead>
						<tbody>
							<?php
							foreach ($desc as $fila) { ?>
								<tr>
									<td><input type="radio" name="descripcion" value="<?= $fila->id_descripcion ?>"/></td>
									<td><?= $fila->concepto ?></td>
									<td><?= $fila->detalles ?></td>
									<td><?= $fila->costo ?></td>
									<td><?= $fila->tipo ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
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
	
	$(document).ready(function() {
		//SE RECALCULA EL IMPORTE, SUBTOTAL, TOTAL E IVA CADA QUE SE ACTUALIZA LA CANTIDAD O LAS HORAS DEL CONCEPTO
		var subtotal = 0;
		for (var i = 0; i < num_concep; i++) {
			imp = parseInt($("#importe" + i).text());
			subtotal = subtotal + imp;
			iva = (subtotal * 16)/100;
			total = subtotal + iva;
		};
		$("#subtotal").text(subtotal);
		$("#iva").text(iva);
		$("#total").text(total);

    	//Seleccionar el radio button al hacer click en el TR
		$('#concep').find('tr').click(function() {
			$(this).find('input').prop("checked", true);
			var id = $('input:radio[name=descripcion]:checked').val();
			//alert(id);
			var num_input = $("#inputs").val();
			$('#seleccionarDescrip').attr("onClick", "cargarDescrip('"+id+"','"+num_input+"')");
		});
		$('#seleccionarDescrip').click(function() {
			var id = $('input:radio[name=descripcion]:checked').val();
			var num_input = $("#inputs").val();
			cargarDescrip(id,num_input);
		});
		$("#e-guardar").click(function(){
			var cants = "";
			for(var i=0; i<num_concep; i++)
			{
				cants += $("#cantidad" + i).val();
				if ((i+1)<num_concep) {
					cants += ",";
				};
			}
			$("#cantidades").val(cants);

			var horas = "";
			for(var i=0; i<num_concep; i++)
			{
				horas += $("#horas" + i).val();
				if ((i+1)<num_concep) {
					horas += ",";
				};
			}
			$("#horastot").val(horas);

			var descripciones = "";
			for(var i=0; i<num_concep; i++)
			{
				descripciones += $("#id_desc" + i).text();
				if ((i+1)<num_concep) {
					descripciones += ",";
				};
			}
			$("#descripciones").val(descripciones);

			$("#totalcot").text($("#total").text());
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
			$('#formconcep')[0].reset();
		});
    });

	function cargarDescrip(id, num)
	{
		$.ajax({
			url: "<?= base_url('cotizaciones/mostrarDescripcion') ?>" + "/" + id, 
			type: "POST",
			dataType: "JSON",
			success: function(data){
				var registro = eval(data);
				var num = parseInt($("#inputs").val());
				//var id = this.id;
				//$('#' + id).hide();
				//SE ACTUALIZAN LOS CAMPOS VACIOS CON LA INFORMACION DEL CONCEPTO SELECCIONADO EN LA MODAL
				$("#concepto" + num).val(registro[0]["concepto"]);
				$("#descripcion" + num).text(registro[0]["detalles"]);
				$("#id_desc" + num).text(registro[0]["id_descripcion"]);
				$("#costo" + num).text(registro[0]["costo"]);
				var cantidad = parseInt($("#cantidad" + num).val());
				var horas = parseInt($("#horas" + num).val());
				var costo = parseInt($("#costo" + num).text());
				var importe = cantidad * costo * horas;
				$("#importe" + num).text(importe);
				//SE RECALCULA EL IMPORTE, SUBTOTAL, TOTAL E IVA CADA QUE SE ACTUALIZA LA CANTIDAD O LAS HORAS DEL CONCEPTO
				var subtotal = 0;
				for (var i = 0; i < num_concep; i++) {
					imp = parseInt($("#importe" + i).text());
					subtotal = subtotal + imp;
					iva = (subtotal * 16)/100;
					total = subtotal + iva;
				};
				$("#subtotal").text(subtotal);
				$("#iva").text(iva);
				$("#total").text(total);
				$("#div-elementos").css("display", "block");
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax - cargarDescrip');
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
		//SE RECALCULA EL IMPORTE, SUBTOTAL, TOTAL E IVA CADA QUE SE ACTUALIZA LA CANTIDAD O LAS HORAS DEL CONCEPTO
		var subtotal = 0;
		for (var i = 0; i < num_concep; i++) {
			imp = parseInt($("#importe" + i).text());
			subtotal = subtotal + imp;
			iva = (subtotal * 16)/100;
			total = subtotal + iva;
		};
		$("#subtotal").text(subtotal);
		$("#iva").text(iva);
		$("#total").text(total);
	}

	function identificarConcepto(num)
	{
		$("#inputs").val(num);
		$('#modal_concepto').modal('show');
	}

	function eliminarConcepto(num)
	{
		$('#row' + num).remove();
		//SE RENOMBRAN TODOS LOS IDS DE LOS ROWS PARA QUE TENGAN SECUENCIA
		for (var i = num; i < num_concep; i++) {
			//SE OBTIENE EL NUMERO DEL ROW CUYO ID VA A SER MODIFICADO
			var modificar = i+1;
			//SE ASIGNAN LOS NUEVOS IDS AL ROW POR MODIFICAR Y A LOS ELEMENTOS DEL ROW 
			$('#row' + modificar).attr("id","row"+i);
			$('#a' + modificar).attr("id","a"+i);
			$('#a' + i).attr("onclick","eliminarConcepto("+i+")");

			$('#cantidad' + modificar).attr("name","cantidad"+i);
			$('#cantidad' + modificar).attr("id","cantidad"+i);

			//alert("row"+i+"-> concepto"+ modificar +"-> identificarconcepto("+i+")");
			$('#addon' + modificar).attr("onclick","identificarConcepto("+i+")");
			$('#addon' + modificar).attr("id","addon"+i);

			$('#concepto' + modificar).attr("name","concepto"+i);
			$('#concepto' + modificar).attr("id","concepto"+i);

			$('#descripcion' + modificar).attr("name","descripcion"+i);
			$('#descripcion' + modificar).attr("id","descripcion"+i);

			$('#horas' + modificar).attr("name","horas"+i);
			$('#horas' + modificar).attr("id","horas"+i);

			$('#costo' + modificar).attr("name","costo"+i);
			$('#costo' + modificar).attr("id","costo"+i);

			$('#importe' + modificar).attr("name","importe"+i);
			$('#importe' + modificar).attr("id","importe"+i);
		};
		num_concep--;
		//SE RECALCULA EL IMPORTE, SUBTOTAL, TOTAL E IVA CADA QUE SE ACTUALIZA LA CANTIDAD O LAS HORAS DEL CONCEPTO
		var subtotal = 0;
		for (var i = 0; i < num_concep; i++) {
			imp = parseInt($("#importe" + i).text());
			subtotal = subtotal + imp;
			iva = (subtotal * 16)/100;
			total = subtotal + iva;
		};
		$("#subtotal").text(subtotal);
		$("#iva").text(iva);
		$("#total").text(total);
	}
	function agregarConcepto()
	{
		html = "<tr id='row"+num_concep+"'><td><a class='i-borrar' id='a"+num_concep+"' href='#' onclick='eliminarConcepto("+num_concep+")'><i class='fa fa-times'></i></a></td><td class='col-cantidad'><input type='text' name='cantidad"+num_concep+"' class='form-control input-recal' value='1' id='cantidad"+num_concep+"'></td><td class='col-concepto'><div class='input-group'><input type='text' name='concepto"+num_concep+"' class='form-control'	placeholder='---' id='concepto"+num_concep+"' disabled='disabled'><div id='addon"+num_concep+"' onClick='identificarConcepto("+num_concep+")' class='input-group-addon'><i class='fa fa-search' aria-hidden='true'></i></div></div></td><td class='col-descripcion'><span name='descripcion"+num_concep+"' id='descripcion"+num_concep+"'></span><span id='id_desc"+num_concep+"' name='id_desc"+num_concep+"' style='display:none'></span></td><td class='col-horas'><div class='input-group'><input type='text' name='horas"+num_concep+"' class='form-control input-recal' value='1' id='horas"+num_concep+"'><div class='input-group-addon'> x $<span name='costo' id='costo"+num_concep+"'>0.00</span></div></div></td><td class='col-importe'><div class='input-group'><span id='importe"+num_concep+"' name='importe"+num_concep+"'>0.00</span></div></td></tr>";
		$("#tabla-conceptos tr:last").after(html);
		num_concep++;

	}

</script>