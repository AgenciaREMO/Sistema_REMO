<div class="container">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Elemento de Sección Nuevo</h2>
				<ol class="breadcrumb" style="margin-bottom: 5px;">
					<li><a href="<?= base_url()?>">Inicio</a></li>
					<li>Cotizaciones</li>
					<li><a href="<?= base_url()?>elementos_seccion/listaElementosSeccion">Gestor de Elementos de Sección</a></li>
					<li>Elemento Nuevo</li>
				</ol>
				<hr>
				<?= form_open('/elementos_seccion/recibirDatosElemento') ?>
				<?php
					//Select
					$otros = 'class="form-control"';
					$seccion = array();
					foreach ($consulta->result() as $fila) 
					{
						$seccion[$fila->id_tipo_seccion] = $fila->seccion;
					}
					//Inputs
					$descripcion = array(
						'name' => 'descripcion',
						'class' => 'form-control',
						'rows' => '3'
					);
					//Botones
					$guardar = array(
						'class' => 'btn btn-primary',
						'value' => 'Guardar'
					);
				?>
				<div class="form-group">
					<?= form_label('Sección', 'seccion') ?>
					<?= form_dropdown('seccion', $seccion, '0', $otros) ?>
				</div>
				<div class="form-group">
					<?= form_label('Descripción del elemento', 'descripcion') ?>
					<?= form_textarea($descripcion) ?>
				</div>
				<?= form_submit($guardar) ?>
				<a href="<?= base_url('elementos_seccion/listaElementosSeccion') ?>" class="btn btn-default">Cancelar</a>
			</div>
		</div>
	</div>
</div>