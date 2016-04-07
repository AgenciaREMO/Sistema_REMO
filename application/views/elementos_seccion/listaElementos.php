<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Elementos de Sección</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Elementos de Sección</li>
			</ol>
			<hr>
			<form class="form-inline">
				<?php
					$seccion = array(
						'name' => 'seccion',
						'class' => 'form-control',
						'placeholder' => 'Sección...',
						'id' => 'i-seccion',
						'onkeyup' => 'buscar_Seccion();'
					);
					$descripcion = array(
						'name' => 'descripcion',
						'class' => 'form-control',
						'placeholder' => 'Descripcion...',
						'id' => 'i-descripcion'
					);
				?>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<?= form_label('Buscar por:') ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<?= form_input($seccion) ?>
					</div>
					<div class="form-group">
						<?= form_input($descripcion) ?>
					</div>
				</div>
			</form>
			<hr>

			<div class="row">
				<div class="col-lg-12" id="lista">
					<table class="table table-striped">
						<tr>
							<th>#</th>	
							<th>Sección</th>
							<th>Descripción</th>
						</tr>
						<?php 
						$i = 1;
						foreach ($consulta->result() as $fila) 
						{ ?>
						<tr>
							<?php if($seccion != $fila->seccion) { ?>
								<td><?= $i ?></td>
								<td>
									<?= $fila->seccion ?>
								</td>
							<?php $i++; } else{ echo "<td></td><td></td>"; } ?>
							<td>
								<a class="i-borrar" href="javascript:void(0)" onclick="eliminar_Elemento('<?= $fila->id_elemento ?>')"><i class="fa fa-times"></i></a>
								<a href="<?= base_url('elementos_seccion/ElementoNuevo') ?>"><?= $fila->descripcion ?></a>
							</td>
						</tr>
						<?php $seccion = $fila->seccion; } ?>
					</table>
					<a href="<?= base_url('elementos_seccion/elementoNuevo') ?>" class="btn btn-primary">Nuevo Elemento</a>
				</div>
			</div>
			
		</div>
	</div>
</div>

