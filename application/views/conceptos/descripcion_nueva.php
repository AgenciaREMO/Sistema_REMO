<div class="container">
	<div class="col-lg-12">
		<h2>Descripción Nueva</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li>Admistrador de Cotizaciones</li>
		  <li><a href="<?= base_url()?>conceptos/listaDescripciones">Conceptos</a></li>
		  <li class="active">Descripción nueva</li>
		</ol>
		<hr>
		<?= form_open('/conceptos/recibirDatosDescripcion') ?>
		<?php
			//Select
			$otros = 'class="form-control"';
			$conceptos = array();
			foreach ($consulta->result() as $fila) 
			{
				$conceptos[$fila->id_concepto] = $fila->nombre;
			}
			//Inputs
			$descripcion = array(
				'name' => 'descripcion',
				'class' => 'form-control',
				'rows' => '2'
			);
			$costo = array(
				'name' => 'costo',
				'class' => 'form-control',
				'placeholder' => 'Cantidad'
			);
			//Botón
			$guardar = array(
				'class' => 'btn btn-primary',
				'value' => 'Guardar'
			);
		?>
			<div class="form-group">
				<?= form_label('Concepto', 'concepto') ?>
				<?= form_dropdown('concepto', $conceptos, 1,$otros) ?>	
			</div>
			<div class="form-group">
				<?= form_label('Descripción', 'descripcion') ?></label>
				<?= form_textarea($descripcion) ?>
			</div>
			<div class="form-group">
			    <?= form_label('Costo por hora', 'costo') ?></label>
				<div class="input-group">
			    	<div class="input-group-addon">$</div>
					<?= form_input($costo) ?>
			    </div>
			</div>
			<?= form_submit($guardar) ?>
			<a href="<?= base_url('conceptos/listaDescripciones') ?>" class="btn btn-default">Cancelar</a>
		<?= form_close() ?>
		
	</div>
</div>