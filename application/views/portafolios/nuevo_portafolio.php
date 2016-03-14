<?php
/*
//Documento: Vista de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>

 <!-- Contenido de la página -->
<div class="container">
	<form >
	    <div class="row">
		  <div class="col-lg-12">
			<div class="form-group">
			    <label for="nomPortafolio">Nombre del portafolio</label>
			    <input type="text" class="form-control" id="nomPortafolio" name="nompor" placeholder="Portafolio de Diseño Web">
			</div>
		</div>
		<div class="col-lg-12">
			<select class="form-control">
				<option>1</option>
			</select>
			<br>
		  </div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
				<a href="<?= base_url() ?>portafolios/c_portafolios/cancelarNuevo" type="submit" class="btn btn-default">Cancelar</a>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
				<a href="<?= base_url() ?>portafolios/c_portafolios/guardarNuevo" type="submit" class="btn btn-default">Siguiente</a>
			<div>
	    </div>
   </form>
</div>