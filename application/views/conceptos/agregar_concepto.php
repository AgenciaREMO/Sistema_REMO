<div class="container">
	<div class="col-lg-12">
		<h2>Crear Concepto</h2>
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
			<?= form_submit($guardar) ?>
			<!--<button type="button" id="e-guardar" class="btn btn-primary btn-oculto" onClick="desactivardesc()" style="display:inline">Guardar</button>
            <button type="button" id="e-cancelar" class="btn btn-primary btn-oculto" onClick="desactivardesc()" style="display:inline">Cancelar</button>-->
		<?= form_close() ?>

	</div>
</div>