<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Cotizaciones Pendientes</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Admistrador de Cotizaciones</li>
			  <li><a href="#">Cotizaciones Pendientes</a></li>
			</ol>
			<hr>

			<!--Sección de busqueda-->
			<form class="form-horizontal">
				<?php
					$personal = array(
						'name' => 'personal',
						'class' => 'form-control',
						'placeholder' => 'Creada por...',
						'id' => 'b-personal'
					);
					$proyecto = array(
						'name' => 'proyecto',
						'class' => 'form-control',
						'placeholder' => 'Proyecto...',
						'id' => 'b-proyecto'
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
							<?= form_label('Buscar por') ?> <a role="button" data-toggle="collapse" href="#collapseBuscar" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
						</div>
					</div>
				</div>
				<div class="collapse" id="collapseBuscar">
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
								<?= form_label('Creada por', 'personal') ?>
								<?= form_input($personal) ?>
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
						<div class="col-lg-2"></div>
					</div>
				</div>
			</form>
			<hr>
			
			<!-- Sección de filtro-->
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-pills" role="tablist">
					  	<li role="presentation"><a href="#" id="f-revision">En revisión <span class="badge"><?= $num_revision ?></span></a></li>
					</ul>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12">
					<a href="<?= base_url('cotizaciones/cotizacionNueva') ?>" class="btn btn-primary">Nueva Cotización</a>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-lg-12" id="lista">
					<table class="table table-hover">
						<tr>
							<th>#</th>	
							<th></th>
							<th>Proyecto</th>
							<th>Creada por</th>
							<th>Estatus</th>
							<th>Generada</th>
							<th>Empresa</th>
						</tr>
						<?php 
						$i = 1;
						foreach ($consulta->result() as $fila) 
						{ ?>
						<tr>
							<td><a class="i-borrar" href="javascript:void(0)" onclick="eliminar_Cotizacion('<?= $fila->id_cotizacion_temp ?>')"><i class="fa fa-times"></i></a> <?= $i ?></td>
							<td>
								<a href="<?= base_url()?>cotizaciones/detallesCotizacion/<?= $fila->id_cotizacion_temp ?>">Continuar</a>
							</td>
							<td><?= $fila->proyecto ?></td>
							<td><?= $fila->personal ?></td>
							<td>En revisión</td>
							<td><?= $fila->f_generacion ?></td>
							<td><?= $fila->empresa ?></td>
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

<script type="text/javascript">
	$(document).on("ready", inicio);
	function inicio()
	{
		var busc = "";
		$('[data-toggle="tooltip"]').tooltip(); 
		
		//Evento Focus
		$("#b-personal").focus(function()
		{
			$("#b-proyecto").val("");
			$("#b-empresa").val("");
			if ($("#b-personal").val().length < 1) 
			{
				busc = "";
				tipo_busqueda = "b-todos";
				buscar(busc, tipo_busqueda);
			}
		});
		$("#b-proyecto").focus(function()
		{
			$("#b-personal").val("");
			$("#b-empresa").val("");
			if ($("#b-proyecto").val().length < 1) 
			{
				busc = "";
				tipo_busqueda = "b-todos";
				buscar(busc, tipo_busqueda);
			}
		});
		$("#b-empresa").focus(function()
		{
			$("#b-personal").val("");
			$("#b-proyecto").val("");
			if ($("#b-empresa").val().length < 1) 
			{
				busc = "";
				tipo_busqueda = "b-todos";
				buscar(busc, tipo_busqueda);
			}
		});

		//Evento KeyUp
		$("#b-personal").keyup(function()
		{
			busc = $("#b-personal").val();
			tipo_busqueda = "b-personal";
			buscar(busc, tipo_busqueda);
		});
		$("#b-proyecto").keyup(function()
		{
			busc = $("#b-proyecto").val();
			tipo_busqueda = "b-proyecto";
			buscar(busc, tipo_busqueda);
		});
		$("#b-empresa").keyup(function()
		{
			busc = $("#b-empresa").val();
			tipo_busqueda = "b-empresa";
			buscar(busc, tipo_busqueda);
		});
	}
	function buscar(busqueda, tipo_bus)
	{
		$.ajax({
			url: "<?= base_url('cotizaciones/mostrarBusquedaTemp') ?>", 
			type: "POST",
			data: {buscar:busqueda, tipo_busqueda:tipo_bus},
			success: function(respuesta){
				var registros = eval(respuesta);

				html = "";
				html += "<table class='table table-hover'><thead><tr><th>#</th><th></th><th>Proyecto</th><th>Creada por</th><th>Estatus</th><th>Generada</th><th>Empresa</th></tr></thead>";
				html += "<tbody>";

				for (var i = 0; i < registros.length; i++) 
				{
					html += "<tr><td><a class='i-borrar' href='javascript:void(0)' onclick='eliminar_Cotizacion("+registros[i]["id_cotizacion_temp"]+")'><i class='fa fa-times'></i></a>"+(i+1)+"</td>";
					html += "<td><a href='<?= base_url()?>cotizaciones/detallesCotizacion/"+registros[i]["id_cotizacion_temp"]+"'>Continuar</td>";
					html += "<td>"+registros[i]["proyecto"]+"</td><td>"+registros[i]["personal"]+"</td><td>En revisión</td>";
					html += "<td>"+registros[i]["f_generacion"]+"</td><td>"+registros[i]["empresa"]+"</td></tr>";
				};

				html += "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
				html += "</tbody></table>";
				$("#lista").html(html);
			}
		});
	}

	function eliminar_Cotizacion(id)
	{
		$('#form')[0].reset();
		$.ajax({
			url : "<?= base_url('cotizaciones/detallesTemporalAjax') ?>" + "/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="modal-proyecto"]').text(data.proyecto);
				$('[name="modal-tipo"]').text(data.tipo_proyecto);
				$('[name="modal-cliente"]').text(data.cliente);
				$('[name="modal-empresa"]').text(data.empresa);
				var generada = data.f_generada;
				$('[name="modal-generada"]').text(expedida);
				$("#a-cotizac").attr("href", "<?= base_url()?>cotizaciones/eliminarTemporal/"+data.id_cotizacion_temp);

				$('#modal_cotizacion').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
</script>

<!-- Modal cotización -->
<div class="modal fade" id="modal_cotizacion" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">¿Desea eliminar esta cotización?</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="form" class="form-horizontal">
		          	<p><strong>Proyecto:</strong> <span name="modal-proyecto"></span> (<span name="modal-tipo"></span>)</p>
		          	<p><strong>Cliente:</strong> <span name="modal-cliente"></span></p>
		          	<p><strong>Empresa:</strong> <span name="modal-empresa"></span></p>
		          	<p><strong>Generada:</strong> <span name="modal-generada"></span></p>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a id="a-cotizac" href="#" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>