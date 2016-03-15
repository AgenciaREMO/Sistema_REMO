<div class="container">
	<div class="col-lg-12">
		<h2>Concepto Nuevo</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li><a href="<?= base_url()?>conceptos/mostrar">Conceptos</a></li>
		  <li class="active">Concepto</li>
		</ol>
		<hr>
		<?= form_open('/conceptos/recibirDatos') ?>
		<?php
			$i = 0;
			$tipos = array();
			$style = 'class="form-control"';
			foreach ($consulta->result() as $fila) 
			{
				$tipos[$fila->id_tipo] = $fila->nombre;
				$i++;
			}
			$nombre = array(
				'name' => 'nombre',
				'class' => 'form-control'
			);
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
			$guardar = array(
				'class' => 'btn btn-primary',
				'value' => 'Guardar'
			);
		?>
			<div class="form-group">
				<?= form_label('Tipo', 'tipo') ?></label>
				<?= form_dropdown('tipo',$tipos,'1', $style) ?>
			</div>
			<div class="form-group">
				<?= form_label('Nombre', 'nombre') ?></label>
				<?= form_input($nombre) ?>
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
			    	<div class="input-group-addon">.00</div>
			    </div>
			</div>
			<?= form_submit($guardar) ?>
			<a href="<?= base_url('conceptos/mostrar') ?>" class="btn btn-default">Cancelar</a>
		<?= form_close() ?>
		
	</div>
</div>