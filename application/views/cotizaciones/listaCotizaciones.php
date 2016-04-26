<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Cotizaciones</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Cotizaciones</li>
			</ol>
			<hr>
			<form class="form-horizontal">
				<?php
					$personal = array(
						'name' => 'personal',
						'class' => 'form-control',
						'placeholder' => 'Personal...',
						'id' => 'b-personal'
					);
					$proyecto = array(
						'name' => 'proyecto',
						'class' => 'form-control',
						'placeholder' => 'Proyecto...',
						'id' => 'b-proyecto'
					);
					$folio = array(
						'name' => 'folio',
						'class' => 'form-control',
						'placeholder' => 'Folio...',
						'id' => 'b-folio'
					);
					$expedicion = array(
						'name' => 'expedicion',
						'class' => 'form-control',
						'placeholder' => 'Fecha de expedición...',
						'id' => 'b-expedicion'
					);
					$vigencia = array(
						'name' => 'vigencia',
						'class' => 'form-control',
						'placeholder' => 'Vigencia...',
						'id' => 'b-vigencia'
					);
					$importe = array(
						'name' => 'importe',
						'class' => 'form-control',
						'placeholder' => 'Importe...',
						'id' => 'b-importe'
					);
					$estatus = array(
						'name' => 'estatus',
						'class' => 'form-control',
						'placeholder' => 'Estatus...',
						'id' => 'b-estatus'
					);
					$empresa = array(
						'name' => 'empresa',
						'class' => 'form-control',
						'placeholder' => 'Empresa...',
						'id' => 'b-empresa'
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
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Folio', 'folio') ?>
							<?= form_input($folio) ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Expedición', 'expedicion') ?>
							<?= form_input($expedicion) ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Proyecto', 'proyecto') ?>
							<?= form_input($proyecto) ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Personal', 'personal') ?>
							<?= form_input($personal) ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Estatus', 'estatus') ?>
							<?= form_input($estatus) ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Importe', 'importe') ?>
							<?= form_input($importe) ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Empresa', 'empresa') ?>
							<?= form_input($empresa) ?>
						</div>
					</div>
				</div>
			</form>
			<hr>

			<div class="row">
				<div class="col-lg-12" id="lista">
					<table class="table table-striped">
						<tr>
							<th>#</th>	
							<th>Folio</th>
							<th>Vigencia</th>
							<th>Proyecto</th>
							<th>Creada por</th>
							<th>Estatus</th>
							<th>Expedida</th>
							<th>Empresa</th>
							<th>Importe</th>
						</tr>
						<?php 
						$i = 1;
						foreach ($consulta->result() as $fila) 
						{ ?>
						<tr>
							<td><?= $i ?></td>
							<td>
								<a class="i-borrar" href="javascript:void(0)" onclick="eliminar_Cotizacion('<?= $fila->id_cotizacion ?>')"><i class="fa fa-times"></i></a>
								<a href="<?= base_url()?>cotizaciones/detallesCotizacion/<?= $fila->id_cotizacion ?>"><?= $fila->folio ?></a>
							</td>
							<td><?= $fila->vigencia ?></td>
							<td><?= $fila->proyecto ?></td>
							<td><?= $fila->personal ?></td>
							<td><?= $fila->estatus ?></td>
							<td><?= $fila->f_expedicion ?></td>
							<td><?= $fila->empresa ?></td>
							<td><?= $fila->total ?></td>
						</tr>
						<?php
							$i++; 
						} ?>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>