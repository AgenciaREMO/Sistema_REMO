<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Cotizaciones</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Cotizaciones</li>
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
					$folio = array(
						'name' => 'folio',
						'class' => 'form-control',
						'placeholder' => 'Folio...',
						'id' => 'b-folio'
					);
					$expedicioninf = array(
						'name' => 'expedicioninf',
						'class' => 'form-control',
						'id' => 'b-expedicioninf',
						'type' => 'date'
					);
					$expedicionsup = array(
						'name' => 'expedicionsup',
						'class' => 'form-control',
						'id' => 'b-expedicionsup',
						'type' => 'date'
					);
					$vigenciainf = array(
						'name' => 'vigenciainf',
						'class' => 'form-control',
						'id' => 'b-vigenciainf',
						'type' => 'date'
					);
					$vigenciasup = array(
						'name' => 'vigenciasup',
						'class' => 'form-control',
						'id' => 'b-vigenciasup',
						'type' => 'date'
					);
					$importeinf = array(
						'name' => 'importeinf',
						'class' => 'form-control',
						'placeholder' => 'Desde...',
						'id' => 'b-importeinf',
						'type' => 'number'
					);
					$importesup = array(
						'name' => 'importesup',
						'class' => 'form-control',
						'placeholder' => 'Hasta...',
						'id' => 'b-importesup',
						'type' => 'number'
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
								<?= form_label('Folio', 'folio') ?>
								<?= form_input($folio) ?>
							</div>
						</div>
						<div class="col-lg-2"></div>
						<div class="col-lg-5">
							<div class="form-group">
									<?= form_label('Expedición') ?>
								<div class="row">
									<div class="col-lg-6">
										<?= form_input($expedicioninf) ?>
									</div>
									<div class="col-lg-6">
										<?= form_input($expedicionsup) ?>
									</div>
								</div>
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
						<div class="col-lg-5">
							<div class="form-group">
									<?= form_label('Importe') ?>
								<div class="row">
									<div class="col-lg-6">
										<?= form_input($importeinf) ?>
									</div>
									<div class="col-lg-6">
										<?= form_input($importesup) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5">
							<div class="form-group">
									<?= form_label('Vigencia') ?>
								<div class="row">
									<div class="col-lg-6">
										<?= form_input($vigenciainf) ?>
									</div>
									<div class="col-lg-6">
										<?= form_input($vigenciasup) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<hr>
			
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-pills" role="tablist">
					  <li role="presentation"><a href="#" id="f-aceptada">Aceptadas <span class="badge"><?= $num_aceptadas ?></span></a></li>
					  <li role="presentation"><a href="#" id="f-revision">En revisión <span class="badge"><?= $num_revision ?></span></a></li>
					  <li role="presentation"><a href="#" id="f-expedida">Expedidas <span class="badge"><?= $num_expedidas ?></span></a></li>
					  <li role="presentation"><a href="#" id="f-rechazada">Rechazadas <span class="badge"><?= $num_rechazadas ?></span></a></li>
					  <li role="presentation"><a href="#" id="f-vencida">Vencidas <span class="badge"><?= $num_vencidas ?></span></a></li>
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

<script type="text/javascript">
	$(document).on("ready", inicio);
	function inicio()
	{
		var busc = "";
		//Evento Focus
		$("#b-personal").focus(function()
		{
			$("#b-proyecto").val("");
			$("#b-folio").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
			$("#b-empresa").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
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
			$("#b-folio").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
			$("#b-empresa").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
			if ($("#b-proyecto").val().length < 1) 
			{
				busc = "";
				tipo_busqueda = "b-todos";
				buscar(busc, tipo_busqueda);
			}
		});
		$("#b-folio").focus(function()
		{
			$("#b-personal").val("");
			$("#b-proyecto").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
			$("#b-empresa").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
			if ($("#b-folio").val().length < 1) 
			{
				busc = "";
				tipo_busqueda = "b-todos";
				buscar(busc, tipo_busqueda);
			}
		});
		$("#b-empresa").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
			$("#b-proyecto").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
			if ($("#b-empresa").val().length < 1) 
			{
				busc = "";
				tipo_busqueda = "b-todos";
				buscar(busc, tipo_busqueda);
			}
		});
		$("#b-expedicioninf").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-empresa").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
			$("#b-proyecto").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
		});
		$("#b-expedicionsup").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-empresa").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
			$("#b-proyecto").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
		});
		$("#b-vigenciainf").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-empresa").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-proyecto").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
		});
		$("#b-vigenciasup").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-empresa").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-proyecto").val("");
			$("#b-importeinf").val("");
			$("#b-importesup").val("");
		});
		$("#b-importeinf").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-empresa").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-proyecto").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");	
		});
		$("#b-importesup").focus(function()
		{
			$("#b-personal").val("");
			$("#b-folio").val("");
			$("#b-empresa").val("");
			$("#b-expedicioninf").val("");
			$("#b-expedicionsup").val("");
			$("#b-proyecto").val("");
			$("#b-vigenciainf").val("");
			$("#b-vigenciasup").val("");
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
		$("#b-folio").keyup(function()
		{
			busc = $("#b-folio").val();
			tipo_busqueda = "b-folio";
			buscar(busc, tipo_busqueda);
		});
		$("#b-empresa").keyup(function()
		{
			busc = $("#b-empresa").val();
			tipo_busqueda = "b-empresa";
			buscar(busc, tipo_busqueda);
		});
		$("#b-importeinf").keyup(function()
		{
			if ($("#b-importeinf").val().length > 0)
			{
				if ($("#b-importesup").val().length < 1) 
				{
					busc = $("#b-importeinf").val();
					tipo_busqueda = "b-importeinf";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-importeinf").val().length > 0)
					{
						importeinf = $("#b-importeinf").val();
						importesup = $("#b-importesup").val();
						tipo_busqueda = "b-importes";
						buscar(busc, tipo_busqueda, importeinf, importesup);
					}
				}
			}
			else
			{
				if($("#b-importesup").val().length > 0)
				{
					busc = $("#b-importesup").val();
					tipo_busqueda = "b-importesup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					busc = "";
					tipo_busqueda = "b-todos";
					buscar(busc, tipo_busqueda);
				}
			}
		});
		$("#b-importesup").keyup(function()
		{
			if ($("#b-importesup").val().length > 0)
			{
				if ($("#b-importeinf").val().length < 1) 
				{
					busc = $("#b-importesup").val();
					tipo_busqueda = "b-importesup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-importesup").val().length > 0)
					{
						importeinf = $("#b-importeinf").val();
						importesup = $("#b-importesup").val();
						tipo_busqueda = "b-importes";
						buscar(busc, tipo_busqueda, importeinf, importesup);
					}
				}
			}
			else
			{
				if($("#b-importesup").val().length > 0)
				{
					busc = $("#b-importesup").val();
					tipo_busqueda = "b-importesup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					busc = "";
					tipo_busqueda = "b-todos";
					buscar(busc, tipo_busqueda);
				}
			}
		});

		//Evento change
		$("#b-expedicioninf").change(function()
		{
			if ($("#b-expedicioninf").val().length > 0)
			{
				if ($("#b-expedicionsup").val().length < 1) 
				{
					busc = $("#b-expedicioninf").val();
					tipo_busqueda = "b-expedicioninf";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-expedicioninf").val().length > 0)
					{
						expedicioninf = $("#b-expedicioninf").val();
						expedicionsup = $("#b-expedicionsup").val();
						tipo_busqueda = "b-expediciones";
						buscar(busc, tipo_busqueda, expedicioninf, expedicionsup);
					}
				}
			}
			else
			{
				if($("#b-expedicionsup").val().length > 0)
				{
					busc = $("#b-expedicionsup").val();
					tipo_busqueda = "b-expedicionsup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					busc = "";
					tipo_busqueda = "b-todos";
					buscar(busc, tipo_busqueda);
				}
			}
		});
		$("#b-expedicionsup").change(function()
		{
			if ($("#b-expedicionsup").val().length > 0)
			{
				if ($("#b-expedicioninf").val().length < 1) 
				{
					busc = $("#b-expedicionsup").val();
					tipo_busqueda = "b-expedicionsup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-expedicionsup").val().length > 0)
					{
						expedicioninf = $("#b-expedicioninf").val();
						expedicionsup = $("#b-expedicionsup").val();
						tipo_busqueda = "b-expediciones";
						buscar(busc, tipo_busqueda, expedicioninf, expedicionsup);
					}
				}
			}
			else
			{
				if($("#b-expedicioninf").val().length > 0)
				{
					busc = $("#b-expedicioninf").val();
					tipo_busqueda = "b-expedicioninf";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					busc = "";
					tipo_busqueda = "b-todos";
					buscar(busc, tipo_busqueda);
				}
			}
		});
		$("#b-vigenciainf").change(function()
		{
			if ($("#b-vigenciainf").val().length > 0)
			{
				if ($("#b-vigenciasup").val().length < 1) 
				{
					busc = $("#b-vigenciainf").val();
					tipo_busqueda = "b-vigenciainf";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-vigenciainf").val().length > 0)
					{
						vigenciainf = $("#b-vigenciainf").val();
						vigenciasup = $("#b-vigenciasup").val();
						tipo_busqueda = "b-vigencias";
						buscar(busc, tipo_busqueda, vigenciainf, vigenciasup);
					}
				}
			}
			else
			{
				if($("#b-vigenciasup").val().length > 0)
				{
					busc = $("#b-vigenciasup").val();
					tipo_busqueda = "b-vigenciasup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					busc = "";
					tipo_busqueda = "b-todos";
					buscar(busc, tipo_busqueda);
				}
			}
		});
		$("#b-vigenciasup").change(function()
		{
			if ($("#b-vigenciasup").val().length > 0)
			{
				if ($("#b-vigenciainf").val().length < 1) 
				{
					busc = $("#b-vigenciasup").val();
					tipo_busqueda = "b-vigenciasup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-vigenciasup").val().length > 0)
					{
						vigenciainf = $("#b-vigenciainf").val();
						vigenciasup = $("#b-vigenciasup").val();
						tipo_busqueda = "b-vigencias";
						buscar(busc, tipo_busqueda, vigenciainf, vigenciasup);
					}
				}
			}
			else
			{
				if($("#b-vigenciainf").val().length > 0)
				{
					busc = $("#b-vigenciainf").val();
					tipo_busqueda = "b-vigenciainf";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					busc = "";
					tipo_busqueda = "b-todos";
					buscar(busc, tipo_busqueda);
				}
			}
		});

		//Evento onclick
		$("#f-aceptada").click(function()
		{
			tipo_filtro = "f-aceptada";
			filtrar(tipo_filtro);
		});
		$("#f-expedida").click(function()
		{
			tipo_filtro = "f-expedida";
			filtrar(tipo_filtro);
		});
		$("#f-rechazada").click(function()
		{
			tipo_filtro = "f-rechazada";
			filtrar(tipo_filtro);
		});
	}
	function buscar(busqueda, tipo_bus, buscinf, buscsup)
	{
		$.ajax({
			url: "<?= base_url('cotizaciones/mostrarBusqueda') ?>", 
			type: "POST",
			data: {buscar:busqueda, tipo_busqueda:tipo_bus, busqueda_inf:buscinf, busqueda_sup: buscsup},
			success: function(respuesta){
				var registros = eval(respuesta);

				html = "";
				html += "<table class='table table-hover'><thead><tr><th>#</th><th>Folio</th><th>Vigencia</th><th>Proyecto</th><th>Creada por</th><th>Estatus</th><th>Expedida</th><th>Empresa</th><th>Importe</th></tr></thead>";
				html += "<tbody>";

				for (var i = 0; i < registros.length; i++) 
				{
					html += "<tr><td>"+(i+1)+"</td>";
					html += "<td><a class='i-borrar' href='javascript:void(0)' onclick='eliminar_Cotizacion("+registros[i]["id_cotización"]+")'><i class='fa fa-times'></i></a> <a href='<?= base_url()?>cotizaciones/detallesCotizacion/"+registros[i]["id_cotización"]+"'>"+registros[i]["folio"]+"</td>";
					html += "<td>"+registros[i]["vigencia"]+"</td><td>"+registros[i]["proyecto"]+"</td><td>"+registros[i]["personal"]+"</td><td>"+registros[i]["estatus"]+"</td>";
					html += "</td><td>"+registros[i]["f_expedicion"]+"</td><td>"+registros[i]["empresa"]+"</td><td>"+registros[i]["total"]+"</td></tr>";
				};

				html += "<tr><td></td><td></td><td></td><td></td><td></td></tr></td><td></td><td></td></tr>";
				html += "</tbody></table>";
				$("#lista").html(html);
			}
		});
	}

	function filtrar(tipo_fil)
	{
		$.ajax({
			url: "<?= base_url('cotizaciones/mostrarFiltro') ?>", 
			type: "POST",
			data: {filtro:tipo_fil},
			success: function(respuesta){
				var registros = eval(respuesta);

				html = "";
				html += "<table class='table table-hover'><thead><tr><th>#</th><th>Folio</th><th>Vigencia</th><th>Proyecto</th><th>Creada por</th><th>Estatus</th><th>Expedida</th><th>Empresa</th><th>Importe</th></tr></thead>";
				html += "<tbody>";

				for (var i = 0; i < registros.length; i++) 
				{
					html += "<tr><td>"+(i+1)+"</td>";
					html += "<td><a class='i-borrar' href='javascript:void(0)' onclick='eliminar_Cotizacion("+registros[i]["id_cotización"]+")'><i class='fa fa-times'></i></a> <a href='<?= base_url()?>cotizaciones/detallesCotizacion/"+registros[i]["id_cotización"]+"'>"+registros[i]["folio"]+"</td>";
					html += "<td>"+registros[i]["vigencia"]+"</td><td>"+registros[i]["proyecto"]+"</td><td>"+registros[i]["personal"]+"</td><td>"+registros[i]["estatus"]+"</td>";
					html += "</td><td>"+registros[i]["f_expedicion"]+"</td><td>"+registros[i]["empresa"]+"</td><td>"+registros[i]["total"]+"</td></tr>";
				};

				html += "<tr><td></td><td></td><td></td><td></td><td></td></tr></td><td></td><td></td></tr>";
				html += "</tbody></table>";
				$("#lista").html(html);
			}
		});
	}
</script>