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
					<th>Concepto</th>
					<th>Descripción</th>
					<th>Costo por hora</th>
					<th>Categoria</th>
					<th></th>
				</tr>
				<?php 
				$i = 1;
				foreach ($consulta->result() as $fila) 
				{ ?>
				<tr>
					<td><?= $i ?></td>
					<td><a href="<?= base_url()?>conceptos/detallesConcepto/<?= $fila->id_concepto ?>"><?= $fila->concepto ?></a></td>	
					<td><a href="<?= base_url()?>conceptos/detallesDescripcion/<?= $fila->id_descripcion ?>"><?= $fila->detalles ?></a></td>
					<td><?= $fila->costo ?></td>
					<td><?= $fila->tipo ?></td>
					<td class="centrar">
						<a class="btn btn-danger" href="javascript:void(0)" onclick="eliminar_Descripcion('<?= $fila->id_descripcion ?>')">Eliminar</a>
					</td>
				</tr>
				<?php 
				$i++;
				} ?>
			</table>
			<a href="<?= base_url('conceptos/conceptoNuevo') ?>" class="btn btn-primary">Nuevo Concepto</a>
			<a href="<?= base_url('conceptos/descripcionNueva') ?>" class="btn btn-primary">Nueva Descripción</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	function eliminar_Descripcion(id)
	{
		//save_method = 'update';
		$('#form')[0].reset();
		$.ajax({
			url : "<?= base_url('conceptos/detallesDescripcion') ?>" + "/" + id,
			type: "GET",
			dataType: "html",
			success: function(fila)
			{
				$('[name="id"]').val(id);
				
				$('#modal_form').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
</script>


<!-- Modal -->
<div class="modal fade" id="modal_form" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">¿Desea eliminar esta descripción?</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="form" class="form-horizontal">
		          	<p name="id"/></p>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="<?= base_url()?>conceptos/eliminarDescripcion/<?= $fila->id_descripcion ?>" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>