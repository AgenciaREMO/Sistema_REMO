<div class="container">
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
				'onClick' => 'activarcon()',
				'style' => 'display:inline',
				'class' => 'btn btn-primary',
				'id' => 'e-editar',
				'content' => 'Editar'
			);
			$cancelar = array(
				'onClick' => 'desactivarcon()',
				'style' => 'display:none',
				'class' => 'btn btn-default',
				'id' => 'e-cancelar',
				'content' => 'Cancelar'
			);
			$guardar = array(
				'style' => 'display:none',
				'class' => 'btn btn-primary',
				'id' => 'e-guardar',
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
					<input type="text" name="cantidades" id="cantidades" style="display:none" value="">
					<input type="text" name="horastot" id="horastot" style="display:none" value="">
					<input type="text" name="descripciones" id="descripciones" style="display:none" value="">
					<table id="tabla-conceptos" class="table table-hover">
						<tr>
							<th></th>
							<th class="col-cantidad">Cant.</th>	
							<th>Concepto</th>
							<th>Descripción</th>
							<th class="col-horas">Horas</th>
							<th class="col-importe">Importe</th>
						</tr>
						<?php 
							$descrips = explode(",", $descripciones); 
							$num_descrips = count($descrips);
							$cantis = explode(",", $cants);
							$hrs = explode(",", $hors);
							for ($i=0; $i < $num_descrips ; $i++) { 
								foreach ($desc as $fila) {
									if ($descrips[$i] == $fila->id_descripcion) { ?>
										<tr>
											<td></td>
											<td class="col-cantidad">
												<input type="text" name="cantidad<?= $i ?>" id="cantidad<?= $i ?>" class="form-control input-recal" value ="<?= $cantis[$i] ?>" disabled="disabled">
											</td>
											<td class="col-concepto">
												<div class="input-group">
													<input type="text" name="concepto<?= $i ?>" id="concepto<?= $i ?>" class="form-control" value="<?= $fila->concepto ?>" disabled="disabled">
													<div class="input-group-addon" id="addon0" onclick="">
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
													<div class="input-group-addon"> x $ <span name="costo0" id="costo0">0.00</span></div>
												</div>
											</td>
											<td class="col-importe">
												<div class="input-group">
													<span id="importe<?= $i ?>"name="importe<?= $i ?>">0.00</span>
												</div>
											</td>
										</tr>
									<?php }
								}
							}
						?>						
					</table>
					<div class="col-lg-4">
						<a href="#" class="btn btn-default" onClick="agregarConcepto()">Agregar Concepto <i class="fa fa-plus" aria-hidden="true"></i></a>
					</div>
					<div class="col-lg-6"></div>
					<div class="col-lg-2">
						<label for="">SUBTOTAL:</label><span name="subtotal" id="subtotal" class="totales">$ 0.00</span><br>
						<label for="">IVA:</label><span name="iva" id="iva" class="totales">$ 0.00</span><br>
						<label for="">*TOTAL:</label><span name="total" id="total" class="totales">$ 0.00</span>
					</div>				
				</div>
			</div>
			<?= form_button($editar) ?>
			<a id="e-volver" href="<?= base_url('cotizaciones/listaCotizaciones') ?>" class="btn btn-default">Volver</a>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>