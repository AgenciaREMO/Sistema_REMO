<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2>Cotización Nueva</h2>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="<?= base_url()?>">Inicio</a></li>
			  <li class="active">Cotizaciones</li>
			  <li><a href="<?= base_url()?>cotizaciones/listaCotizaciones">Gestor de Cotizaciones</a></li>
			  <li class="active">Cotización</li>
			</ol>
			<hr>
			<?= form_open('/cotizaciones/recibirDatosCotizacion') ?>
			<?php
				$style = 'class="form-control"';
				//Select
				$personal = array();
				foreach ($consulta->result() as $fila) 
				{
					$personal[$fila->id_personal] = $fila->nombre;
				}
				//Inputs
				$proyecto = array(
					'name' => 'proyecto',
					'onclick' => 'buscar_Proyecto()',
					'class' => 'form-control'
				);
				//Botón
				$guardar = array(
					'class' => 'btn btn-primary',
					'value' => 'Guardar'
				);
			?>
				<h3>Información General</h3>
				<div class="col-lg-12 text-right">
					<?php 
						$dia = date('j');
						$mes = date('n');
						$meses = array(
							'1' => 'Enero',
							'2' => 'Febrero',
							'3' => 'Marzo',
							'4' => 'Abril',
							'5' => 'Mayo',
							'6' => 'Junio',
							'7' => 'Julio',
							'8' => 'Agosto',
							'9' => 'Septiembre',
							'10' => 'Octubre',
							'11' => 'Noviembre',
							'12' => 'Diciembre'
						);
						for ($i=1; $i<13; $i++) { 
							if($mes == $i){$mes = $meses[$i];}
						}
						$anio = date('Y');
						$fecha = $dia." de ".$mes." de ".$anio;
						echo "<p>Santiago de Querétaro, Qro., a ".$fecha."</p>";
					?>
					<?= form_label('COTIZACIÓN: XXXXXXXXXX') ?> 
				</div>
				<div class="form-group">
					<?= form_label('Elaborada por', 'personal') ?>
					<?= form_dropdown('personal',$personal,'1', $style) ?>
				</div>
				<div class="form-group">
					<a href="" data-toggle="modal" data-target="#modal_proyecto">Proyecto</a>
					
				</div>
				<?= form_submit($guardar) ?>
				<a href="<?= base_url('conceptos/listaDescripciones') ?>" class="btn btn-default">Cancelar</a>
			<?= form_close() ?>
			
		</div>
	</div>
</div>

<!-- Modal concepto -->
<div class="modal fade" id="modal_proyecto" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title">Selecciona el proyecto</h4>
	      	</div>
	      	<div class="modal-body form">
	      		<form action="#" id="form" class="form-horizontal">
					<table id="proys" class="table table-hover"><thead><tr><th>#</th><th>Proyecto</th><th>Empresa</th></tr></thead><tbody>
					<?php 
						$i = 1;
						foreach ($proyectos->result() as $fila) 
						{ ?>
							<tr>
								<td><?php echo form_radio("proyecto", $fila->id_proyecto, FALSE) . " " . $i ?></td>
								<td><?= $fila->nombre ?></td>
								<td><?= $fila->empresa ?></td>
							</tr>
						<?php $i++; } ?>
					</tbody></table>
		        </form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<a href="" class="btn btn-danger">Eliminar</a>
	      	</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    $('#proys').find('tr').click(function() {
    	$(this).find('input').prop("checked", true);
    });
});
</script>