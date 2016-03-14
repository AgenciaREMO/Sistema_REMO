<div class="container">
	<div class="col-12">
		<h2>Editar Concepto</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li><a href="<?= base_url()?>conceptos/mostrar">Conceptos</a></li>
		  <li class="active">Concepto</li>
		</ol>
		<hr>
		<?= form_open(base_url('conceptos/editarConcepto').'/'.$id_concepto) ?>
		<?php 
			$i =0;
			//Input
			$style = 'id="i-categoria" class="form-control" disabled="disabled"';
			//Select
			$tipos = array();
			foreach ($consulta->result() as $fila) 
			{
				$tipos[$fila->id_tipo] = $fila->nombre;
				$i++;
			}
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
				'onClick' => 'desactivarcon()',
				'style' => 'display:none',
				'class' => 'btn btn-primary',
				'id' => 'e-guardar',
				'value' => 'Guardar'
			);
		?>
			
			<div class="form-group">
				<?= form_label('Nombre', 'nombre') ?></label>
				<?= form_input($nombre) ?>
			</div>
			<div class="form-group">
				<?= form_label('Tipo', 'tipo') ?></label>
				<?= form_dropdown('tipo', $tipos, $id_tipo, $style) ?>	
			</div>
			<?= form_button($editar) ?>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>