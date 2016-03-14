<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Conceptos</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li><a href="<?= base_url()?>conceptos/mostrar">Conceptos</a></li>
			</ol>
			<hr>
			<table class="table table-striped">
				<tr>
					<th>#</th>	
					<th>Categoria</th>
					<th>Concepto</th>
					<th>Descripción</th>
					<th>Costo por hora</th>
				</tr>
				<?php 
				$i = 1;
				foreach ($consulta->result() as $fila) 
				{ ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $fila->tipo ?></td>
					<td><?= $fila->concepto ?></td>	
					<td><a href="<?= base_url()?>conceptos/detallesDescripcion/<?= $fila->id_descripcion ?>"><?= $fila->detalles ?></a></td>
					<td><?= $fila->costo ?></td>
				</tr>
				<?php 
				$i++;
				} ?>
			</table>
			<a href="<?= base_url('conceptos/conceptoNuevo') ?>" class="btn btn-primary">Nuevo Concepto</a>
			<a href="#" class="btn btn-primary">Nueva Descripción</a>
		</div>
	</div>
</div>