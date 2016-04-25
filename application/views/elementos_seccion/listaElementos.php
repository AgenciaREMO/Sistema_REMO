<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Elementos de Sección</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Elementos de Sección</li>
			</ol>
			<hr>
			<form class="form-horizontal">
				<?php
					$seccion = array(
						'name' => 'seccion',
						'class' => 'form-control',
						'placeholder' => 'Sección...',
						'id' => 'b-seccion'
					);
					$descripcion = array(
						'name' => 'descripcion',
						'class' => 'form-control',
						'placeholder' => 'Descripcion...',
						'id' => 'b-elemento'
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
							<?= form_label('Sección', 'seccion') ?>
							<?= form_input($seccion) ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Descripción', 'descripcion') ?>
							<?= form_input($descripcion) ?>
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
							<th>Sección</th>
							<th>Descripción</th>
						</tr>
						<?php 
						$i = 1;
						$seccion = null;
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
								<a href="<?= base_url()?>elementos_seccion/detallesElemento/<?=$fila->id_elemento?>"><?= $fila->descripcion ?></a>
							</td>
						</tr>
						<?php $seccion = $fila->seccion; } ?>
						<tr>
							 <td></td>
							 <td></td>
							 <td>	
								<a href="<?= base_url('elementos_seccion/elementoNuevo') ?>" class="btn btn-primary">Nuevo Elemento</a>
							 </td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>

<script>
$(document).on("ready", inicio);
	function inicio()
	{
		var busc = "";
		//Evento Focus
		$("#b-seccion").focus(function()
		{
			$("#b-elemento").val("");
		});
		$("#b-elemento").focus(function()
		{
			$("#b-seccion").val("");
		});
		//Evento KeyUp
		$("#b-seccion").keyup(function()
		{
			busc = $("#b-seccion").val();
			tipo_busqueda = "b-seccion";
			buscar(busc, tipo_busqueda);
		});
		$("#b-elemento").keyup(function()
		{
			busc = $("#b-elemento").val();
			tipo_busqueda = "b-elemento";
			buscar(busc, tipo_busqueda);
		});
	}
	function eliminar_Elemento(id)
	{
		$('#form')[0].reset();
		$.ajax({
			url : "<?= base_url('elementos_seccion/detallesElementoAjax') ?>" + "/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="seccion"]').text(data.seccion);
				$('[name="descripcion"]').text(data.descripcion);
				$("a").attr("href", "<?= base_url()?>elementos_seccion/eliminarElemento/"+data.id_elemento);

				$('#modal_elemento').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
	function buscar(busqueda, tipo_bus)
	{
		$.ajax({
			url: "<?= base_url('elementos_seccion/mostrarBusqueda') ?>", 
			type: "POST",
			data: {buscar:busqueda, tipo_busqueda:tipo_bus},
			success: function(respuesta){
				var registros = eval(respuesta);
				var seccion = null;
				var j = 1;

				html = "";
				html += "<table class='table table-striped'><thead><tr><th>#</th><th>Sección</th><th>Descripción</th></tr></thead>";
				html += "<tbody>";

				for (var i = 0; i < registros.length; i++) 
				{
					if(seccion != registros[i]["seccion"])
					{
						html += "<tr><td>"+j+"</td>";
						html += "<td>"+registros[i]["seccion"]+"</td>";
						j++;
					}
					else
					{ 
						html += "<tr><td></td><td></td>"; 
					}
					html += "<td><a class='i-borrar' href='javascript:void(0)' onclick='eliminar_Elemento("+registros[i]["id_elemento"]+")'><i class='fa fa-times'></i></a> <a href='<?= base_url()?>elementos_seccion/detallesElemento/"+registros[i]["id_elemento"]+"'>"+registros[i]["descripcion"]+"</a></td></tr>";
					seccion = registros[i]["seccion"]; 
				};

				html += "<tr><td></td><td></td><td><a href='<?= base_url("elementos_seccion/elementoNuevo") ?>' class='btn btn-primary'>Nuevo Elemento</a></td></tr>";
				html += "</tbody></table>";
				$("#lista").html(html);
			}
		});
	}
</script>

<!-- Modal descripción -->
<div class="modal fade" id="modal_elemento" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">¿Desea eliminar este elemento de sección?</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="form" class="form-horizontal">
					<p><strong>Sección:</strong> <span name="seccion"></span></p>
		          	<p><strong>Descripción:</strong> <span name="descripcion"></span></p>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="#" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>