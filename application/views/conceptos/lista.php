<!--<h1>Listado</h1-->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Conceptos</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table class="table table-striped">
				<tr>
					<th>#</th>	
					<th>Categoria</th>
					<th>Concepto</th>
					<th>Descripción</th>
					<th>Costo</th>
				</tr>
				<?php 
				$i = 1;
				foreach ($consulta->result() as $fila) 
				{ ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $fila->tipo ?></td>
					<td><?= $fila->concepto ?></td>	
					<td><a href="<?= base_url()?>conceptos/detalles/<?= $fila->id_descripcion?>"><?= $fila->detalles ?></a></td>
					<td><?= $fila->costo ?></td>
				</tr>
				<?php 
				$i++;
				} ?>
			</table>
		</div>
	</div>
</div>