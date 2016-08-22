<div class="container">
	<div class="col-12">
		<h2>Editar Cotización Temporal</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  	<li><a href="<?= base_url()?>">Inicio</a></li>
			<li>Cotizaciones</li>
		  	<li><a href="<?= base_url()?>contizaciones/listaCotizaciones">Gestor de Cotizaciones</a></li>
		  	<li class="active">Cotización</li>
		</ol>
		<hr>
		<?= form_open('cotizaciones/editarTemp/'. $id_temp) ?>
		<?php
			$style = 'class="form-control"';
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
			</div>
			<div class="form-group">
				<?= form_label('Elaborada por', 'personal') ?>
				<?= form_dropdown('personal',$personal,$id_personal, $style) ?>
			</div>
			<div class='row'>
				<div class='col-lg-12'>
					<p>
						<label>Nombre del Proyecto:</label><?php echo " " . $nombre_proyecto; ?>
					</p>
					<input type='text' style='display:none' name='id_proyecto' value='"+id+"'>
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
		</div>
			<?= form_button($editar) ?>
			<a id="e-volver" href="<?= base_url('cotizaciones/listaCotizaciones') ?>" class="btn btn-default">Volver</a>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>