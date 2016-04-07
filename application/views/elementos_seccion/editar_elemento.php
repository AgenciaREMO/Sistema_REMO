<div class="container">
	<div class="col-12">
		<h2>Editar Elemento de Sección</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li><a href="<?= base_url()?>elementos_seccion/listaElementosSeccion">Elementos de Sección</a></li>
		  <li class="active">Elemento</li>
		</ol>
		<hr>
		<?= form_open('elementos_seccion/editarElemento/'.$id_elemento) ?>
		<?php 
			//Select
			$otros = 'id="i-seccion" class="form-control" disabled="disabled"';
			$secciones = array(
				'Consideraciones' => 'Consideraciones',
				'Entregables' => 'Entregables', 
				'Forma de pago' => 'Forma de pago', 
				'Requerimientos' => 'Requerimientos', 
				'Tiempo estimado de entrega' => 'Tiempo estimado de entrega'
			);
			//Inputs
			$descripcion = array(
				'name' => 'descripcion',
				'class' => 'form-control',
				'id' => 'i-descripcion',
				'rows' => '2',
				'value' => $descripcion,
				'disabled' => 'disabled'
			);
			//Botones
			$editar = array(
				'onClick' => 'activarelemento()',
				'style' => 'display:inline',
				'class' => 'btn btn-primary',
				'id' => 'e-editar',
				'content' => 'Editar'
			);
			$cancelar = array(
				'onClick' => 'desactivarelemento()',
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
				<?= form_label('Sección', 'seccion') ?>
				<?= form_dropdown('seccion', $secciones, $seccion, $otros) ?>	
			</div>
			<hr>
			<div class="form-group">
				<?= form_label('Descripción', 'descripcion') ?></label>
				<?= form_textarea($descripcion) ?>
			</div>
			<?= form_button($editar) ?>
			<a  id="e-volver" href="<?= base_url('elementos_seccion/listaElementosSeccion') ?>" class="btn btn-default">Volver</a>
			<?= form_submit($guardar) ?>
			<?= form_button($cancelar) ?>
		<?= form_close() ?>
	</div>
</div>