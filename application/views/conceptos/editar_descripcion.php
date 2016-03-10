<div class="container">
	<div class="col-12">
		<h2>Editar Descripción</h2>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
		  <li><a href="<?= base_url()?>">Inicio</a></li>
		  <li><a href="<?= base_url()?>conceptos/mostrar">Conceptos</a></li>
		  <li class="active">Descripción</li>
		</ol>
		<hr>
		<form action="">
			<div class="form-group">
				<label>Concepto</label>
				<select id="i-categoria" class="form-control" disabled>
					<?php foreach ($consulta->result() as $fila) { ?>
					<?php if ($concepto == $fila->nombre) { ?>
						<option value="<?= $fila->id_concepto ?>" selected><?= $fila->nombre ?></option>	
					<?php } else { ?>
					<option value="<?= $fila->id_concepto ?>"><?= $fila->nombre ?></option>
					<?php } } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Categoria</label>
				<input type="text" class="form-control" value="<?= $categoria ?>" disabled>
			</div>
			<hr>
			<div class="form-group">
				<label>Detalles</label>
				<textarea id="i-detalles" class="form-control" rows="2" disabled><?= $detalles ?></textarea>
			</div>
			<div class="form-group">
				<label>Importe</label>
				<input type="text" id="i-importe" class="form-control" value="<?= $costo ?>" disabled>
			</div>
			<button type="button" id="e-editar" class="btn btn-primary" onClick="activardesc()" style="display:inline">Editar <i class="fa fa-edit fa-lg"></i></button>
            <a href="<?= base_url('conceptos/editarDescripcion').'/'.$id_descripcion ?>" id="e-guardar" class="btn btn-primary btn-oculto" onClick="desactivardesc()" style="display:none">Guardar</a>
            <button type="button" id="e-cancelar" class="btn btn-primary btn-oculto" onClick="desactivardesc()" style="display:none">Cancelar</button>
		</form>
	</div>
</div>