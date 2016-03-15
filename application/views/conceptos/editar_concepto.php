<div class="container">
	<div class="col-12">
		<h2>Editar Concepto</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li><a href="<?= base_url()?>conceptos/mostrar">Conceptos</a></li>
		  <li class="active">Concepto</li>
		</ol>
		<hr>
		<?= form_open('conceptos/editarConcepto/'.$id_concepto) ?>
		<?php 
			//Select
			$i = 0;
			$otros = 'id="i-categoria" class="form-control" disabled="disabled"';
			$tipos = array();
			foreach ($consulta->result() as $fila) 
			{
				$tipos[$fila->id_tipo] = $fila->nombre;
				$i++;
			}
			//Inputs
			$nombre = array(
				'name' => 'nombre',
				'class' => 'form-control',
				'value' => $concepto,
				'id' => 'i-concepto',
				'disabled' => 'disabled'
			);
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
			<div class="form-group">
				<?= form_label('Tipo', 'tipo') ?>
				<?= form_dropdown('tipo', $tipos, $id_tipo, $otros) ?>	
			</div>
			<div class="form-group">
				<?= form_label('Nombre', 'nombre') ?>
				<?= form_input($nombre) ?>
			</div>
			<?= form_button($editar) ?>
			<a  id="e-volver" href="<?= base_url('conceptos/mostrar') ?>" class="btn btn-default">Volver</a>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>