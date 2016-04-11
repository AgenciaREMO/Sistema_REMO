<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Conceptos y Descripciones</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Conceptos y Descripciones</li>
			</ol>
			<hr>
			<form class="form-inline">
				<?php
					$concepto = array(
						'name' => 'concepto',
						'class' => 'form-control',
						'placeholder' => 'Concepto...',
						'id' => 'b-concepto'
					);
					$descripcion = array(
						'name' => 'descripcion',
						'class' => 'form-control',
						'placeholder' => 'Descripcion...',
						'id' => 'b-descripcion'
					);
					$costo = array(
						'name' => 'costo',
						'class' => 'form-control',
						'placeholder' => 'Costo...',
						'id' => 'b-costo'
					);
					$categoria = array(
						'name' => 'categoria',
						'class' => 'form-control',
						'placeholder' => 'Categoria...',
						'id' => 'b-categoria'
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
						<?= form_input($concepto) ?>
					</div>
					<div class="form-group">
						<?= form_input($descripcion) ?>
					</div>
					<div class="form-group">
						<?= form_input($costo) ?>
					</div>
					<div class="form-group">
						<?= form_input($categoria) ?>
					</div>
				</div>
			</form>
			<hr>

			<div class="row">
				<div class="col-lg-12" id="lista">
					<table class="table table-striped">
						<tr>
							<th>#</th>	
							<th>Concepto</th>
							<th>Descripción</th>
							<th>Costo por hora</th>
							<th>Categoria</th>
						</tr>
						<?php 
						$i = 1;
						$concepto = null;
						foreach ($consulta->result() as $fila) 
						{ ?>
						<tr>
							<?php if($concepto != $fila->id_concepto) { ?>
							<td><?= $i ?></td>
							<td>
								<a class="i-borrar" href="javascript:void(0)" onclick="eliminar_Concepto('<?= $fila->id_concepto ?>')"><i class="fa fa-times"></i></a>
								<a href="<?= base_url()?>conceptos/detallesConcepto/<?= $fila->id_concepto ?>"><?= $fila->concepto ?></a>
							</td>	
							<?php $i++; } else{ echo "<td></td><td></td>"; } ?>
							<td>
								<a class="i-borrar" href="javascript:void(0)" onclick="eliminar_Descripcion('<?= $fila->id_descripcion ?>')"><i class="fa fa-times"></i></a>
								<a href="<?= base_url()?>conceptos/detallesDescripcion/<?= $fila->id_descripcion ?>"><?= $fila->detalles ?></a>
							</td>
							<td><?= $fila->costo ?></td>
							<td><?= $fila->tipo ?></td>
						</tr>
						<?php
						$concepto = $fila->id_concepto; 
						} ?>
						<tr>
							<td></td>
							<td><a href="<?= base_url('conceptos/conceptoNuevo') ?>" class="btn btn-primary">Nuevo Concepto</a></td>
							<td><a href="<?= base_url('conceptos/descripcionNueva') ?>" class="btn btn-primary">Nueva Descripción</a></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on("ready", inicio);
	function inicio()
	{
		$("#b-concepto").keyup(function(){
			buscar = $("#buscar").val();
			buscar_Concepto(buscar);
		});
	}
	function eliminar_Concepto(id)
	{
		$('#form')[0].reset();
		$.ajax({
			url : "<?= base_url('conceptos/detallesConceptoAjax') ?>" + "/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="categoria"]').text(data.tipo);
				$('[name="concepto"]').text(data.concepto);
				$("a").attr("href", "<?= base_url()?>conceptos/eliminarConcepto/"+data.id_concepto);

				$('#modal_concepto').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
	function eliminar_Descripcion(id)
	{
		$('#form')[0].reset();
		$.ajax({
			url : "<?= base_url('conceptos/detallesDescripcionAjax') ?>" + "/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="id_descripcion"]').val(data.id_descripcion)
				$('[name="categoria"]').text(data.tipo);
				$('[name="concepto"]').text(data.concepto);
				$('[name="descripcion"]').text(data.detalles);
				$('[name="costo"]').text(data.costo);
				$("a").attr("href", "<?= base_url()?>conceptos/eliminarDescripcion/"+data.id_descripcion);

				$('#modal_descripcion').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
	function buscar_Concepto(busqueda)
	{
		$.ajax({
			url: "<?= base_url('conceptos/mostrarBusqueda') ?>", 
			type: "POST",
			data: {buscar:busqueda},
			success: function(respuesta){
				alert(respuesta);
			}
		});
	}
</script>

<!-- Modal concepto -->
<div class="modal fade" id="modal_concepto" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">¿Desea eliminar este concepto?</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<p class="bg-danger"><strong>RECUERDA: Al eliminar el concepto se eliminaran todas las descripciones asociadas con él.</strong></p>
	      		<form action="#" id="form" class="form-horizontal">
					<p><strong>Categoría:</strong> <span name="categoria"></span></p>
		          	<p><strong>Concepto:</strong> <span name="concepto"></span></p>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="<?= base_url()?>conceptos/eliminarConcepto/<?= $fila->id_concepto ?>" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>

<!-- Modal descripción -->
<div class="modal fade" id="modal_descripcion" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">¿Desea eliminar esta descripción?</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="form" class="form-horizontal">
	      			<input type="text" name="id_descripcion">
					<p><strong>Categoría:</strong> <span name="categoria"></span></p>
		          	<p><strong>Concepto:</strong> <span name="concepto"></span></p>
		          	<p><strong>Descripción:</strong> <span name="descripcion"></span></p>
		          	<p><strong>Costo por hora:</strong> <span name="costo"></span></p>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="#" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>