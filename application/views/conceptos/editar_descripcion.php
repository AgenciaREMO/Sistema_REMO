<div class="container">
	<div class="col-12">
		<h2>Editar Descripción</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li><a href="<?= base_url()?>conceptos/mostrar">Conceptos</a></li>
		  <li class="active">Descripción</li>
		</ol>
		<hr>
		<?= form_open('conceptos/editarDescripcion/'.$id_descripcion) ?>
		<?php 
			//Select
			$otros = 'id="i-concepto" class="form-control" disabled="disabled"';
			$conceptos = array();
			foreach ($consulta->result() as $fila) 
			{
				$conceptos[$fila->id_concepto] = $fila->nombre;
			}
			//Inputs
			$tipo = array(
				'name' => 'tipo',
				'class' => 'form-control',
				'id' => 'i-tipo',
				'value' => $tipo,
				'disabled' => 'disabled'
			);
			$descripcion = array(
				'name' => 'descripcion',
				'class' => 'form-control',
				'id' => 'i-detalles',
				'rows' => '2',
				'value' => $detalles,
				'disabled' => 'disabled'
			);
			$costo = array(
				'name' => 'costo',
				'class' => 'form-control',
				'id' => 'i-costo',
				'value' =>  $costo,
				'disabled' => 'disabled'
			);
			//Botones
			$editar = array(
				'onClick' => 'activardesc()',
				'style' => 'display:inline',
				'class' => 'btn btn-primary',
				'id' => 'e-editar',
				'content' => 'Editar'
			);
			$cancelar = array(
				'onClick' => 'desactivardesc()',
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
			<div class="form-group">
				<?= form_label('Tipo', 'tipo') ?>
				<?= form_input($tipo) ?>
			</div>
			<div class="form-group">
				<?= form_label('Concepto', 'concepto') ?>
				<?= form_dropdown('concepto', $conceptos, $id_concepto, $otros) ?>	
			</div>
			<hr>
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
			<?= form_button($editar) ?>
			<a  id="e-volver" href="<?= base_url('conceptos/mostrar') ?>" class="btn btn-default">Volver</a>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>