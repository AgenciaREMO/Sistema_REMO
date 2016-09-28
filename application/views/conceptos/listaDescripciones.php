<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Gestor de Conceptos</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li>Cotizaciones</li>
			  <li><a href="#">Gestor de Conceptos</a></li>
			</ol>
			<hr>
			<form class="form-horizontal">
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
					$costoinf = array(
						'name' => 'costoinf',
						'class' => 'form-control',
						'placeholder' => 'Desde...',
						'id' => 'b-costoinf',
						'type' => 'number'
					);
					$costosup = array(
						'name' => 'costosup',
						'class' => 'form-control',
						'placeholder' => 'Hasta...',
						'id' => 'b-costosup',
						'type' => 'number'
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
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Concepto', 'concepto') ?>
							<?= form_input($concepto) ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<?= form_label('Descripción', 'descripcion') ?>
							<?= form_input($descripcion) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="col-lg-5">
								<div class="form-group">
									<?= form_label('Categoria', 'categoria') ?>
									<?= form_input($categoria) ?>
								</div>
							</div>
							<div class="col-lg-2"></div>
							<div class="col-lg-5">
								<div class="form-group">
									<?= form_label('Costo') ?>
									<div class="row">
										<div class="col-lg-6">
											<?= form_input($costoinf) ?>
										</div>
										<div class="col-lg-6">
											<?= form_input($costosup) ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<hr>

			<div class="row">
				<div class="col-lg-12" id="lista">
					<table class="table table-hover">
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
						foreach ($descripciones->result() as $fila) 
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
	<div class="row">
     	<div class="col-lg-12 text-center">
        	<?php echo $paginationDescripcion;?>
      	</div>
    </div>
</div>

<script type="text/javascript">
	$(document).on("ready", inicio);
	function inicio()
	{
		var busc = "";
		//Evento Focus
		$("#b-concepto").focus(function()
		{
			$("#b-descripcion").val("");
			$("#b-costoinf").val("");
			$("#b-costosup").val("");
			$("#b-categoria").val("");
		});
		$("#b-descripcion").focus(function()
		{
			$("#b-concepto").val("");
			$("#b-costoinf").val("");
			$("#b-costosup").val("");
			$("#b-categoria").val("");
		});
		$("#b-costoinf").focus(function()
		{
			$("#b-concepto").val("");
			$("#b-categoria").val("");
			$("#b-descripcion").val("");
		});
		$("#b-costosup").focus(function()
		{
			$("#b-concepto").val("");
			$("#b-categoria").val("");
			$("#b-descripcion").val("");
		});
		$("#b-categoria").focus(function()
		{
			$("#b-concepto").val("");
			$("#b-costoinf").val("");
			$("#b-costosup").val("");
			$("#b-descripcion").val("");
		});
		//Evento KeyUp
		$("#b-concepto").keyup(function()
		{
			busc = $("#b-concepto").val();
			tipo_busqueda = "b-concepto";
			buscar(busc, tipo_busqueda);
		});
		$("#b-descripcion").keyup(function()
		{
			busc = $("#b-descripcion").val();
			tipo_busqueda = "b-descripcion";
			buscar(busc, tipo_busqueda);
		});
		$("#b-costoinf").keyup(function()
		{
			if ($("#b-costoinf").val().length > 0)
			{
				if ($("#b-costosup").val().length < 1) 
				{
					busc = $("#b-costoinf").val();
					tipo_busqueda = "b-costoinf";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-costoinf").val().length > 0)
					{
						costoinf = $("#b-costoinf").val();
						costosup = $("#b-costosup").val();
						tipo_busqueda = "b-costos";
						buscar(busc, tipo_busqueda, costoinf, costosup);
					}
				}
			};
		});
		$("#b-costosup").keyup(function()
		{
			if ($("#b-costosup").val().length > 0)
			{
				if ($("#b-costoinf").val().length < 1) 
				{
					busc = $("#b-costosup").val();
					tipo_busqueda = "b-costosup";
					buscar(busc, tipo_busqueda);
				}
				else
				{
					if ($("#b-costosup").val().length > 0)
					{
						costoinf = $("#b-costoinf").val();
						costosup = $("#b-costosup").val();
						tipo_busqueda = "b-costos";
						buscar(busc, tipo_busqueda, costoinf, costosup);
					}
				}
			};
		});
		$("#b-categoria").keyup(function()
		{
			busc = $("#b-categoria").val();
			tipo_busqueda = "b-categoria";
			buscar(busc, tipo_busqueda);
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
				$("#a-concep").attr("href", "<?= base_url()?>conceptos/eliminarConcepto/"+data.id_concepto);
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
				$('[name="categoria"]').text(data.tipo);
				$('[name="concepto"]').text(data.concepto);
				$('[name="descripcion"]').text(data.detalles);
				$('[name="costo"]').text(data.costo);
				$("#a-descrip").attr("href", "<?= base_url()?>conceptos/eliminarDescripcion/"+data.id_descripcion);
				$('#modal_descripcion').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				 alert('Error get data from ajax');
			}
		});
	}
	function buscar(busqueda, tipo_bus, costoinf, costosup)
	{
		$.ajax({
			url: "<?= base_url('conceptos/mostrarBusqueda') ?>", 
			type: "POST",
			data: {buscar:busqueda, tipo_busqueda:tipo_bus, costo_inf:costoinf, costo_sup: costosup},
			success: function(respuesta){
				var registros = eval(respuesta);
				var concepto = null;
				var j = 1;
				html = "";
				html += "<table class='table table-hover'><thead><tr><th>#</th><th>Concepto</th><th>Descripción</th><th>Costo por hora</th><th>Categoria</th></tr></thead>";
				html += "<tbody>";
				for (var i = 0; i < registros.length; i++) 
				{
					if(concepto != registros[i]["concepto"])
					{
						html += "<tr><td>"+j+"</td>";
						html += "<td><a class='i-borrar' href='javascript:void(0)' onclick='eliminar_Concepto("+registros[i]["id_concepto"]+")'><i class='fa fa-times'></i></a> <a href='<?= base_url()?>conceptos/detallesConcepto/"+registros[i]["id_concepto"]+"'>"+registros[i]["concepto"]+"</td>";
						j++;
					}
					else
					{ 
						html += "<tr><td></td><td></td>"; 
					}
					html += "<td><a class='i-borrar' href='javascript:void(0)' onclick='eliminar_Descripcion("+registros[i]["id_descripcion"]+")'><i class='fa fa-times'></i></a> <a href='<?= base_url()?>conceptos/detallesDescripcion/"+registros[i]["id_descripcion"]+"'>"+registros[i]["detalles"]+"</a></td>";
					html += "</td><td>"+registros[i]["costo"]+"</td><td>"+registros[i]["tipo"]+"</td></tr>";
					concepto = registros[i]["concepto"]; 
				};
				html += "<tr><td></td><td><a href='<?= base_url("conceptos/conceptoNuevo") ?>' class='btn btn-primary'>Nuevo Concepto</a></td><td><a href='<?= base_url("conceptos/descripcionNueva") ?>' class='btn btn-primary'>Nueva Descripción</a></td><td></td><td></td></tr>";
				html += "</tbody></table>";
				$("#lista").html(html);
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
	        	<a id="a-concep" href="#" class="btn btn-danger">Eliminar</a>
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
					<p><strong>Categoría:</strong> <span name="categoria"></span></p>
		          	<p><strong>Concepto:</strong> <span name="concepto"></span></p>
		          	<p><strong>Descripción:</strong> <span name="descripcion"></span></p>
		          	<p><strong>Costo por hora:</strong> <span name="costo"></span></p>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a id="a-descrip" href="#" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>