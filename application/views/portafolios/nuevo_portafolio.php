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
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
				  <li><a href="<?= base_url()?>portafolios/c_portafolios/mostrar">Protafolios</a></li>
				  <li><a href="active">Crear portafolio</a></li>
				</ol>
			</div>
		</div>
	<form action="<?= base_url() ?>portafolios/c_portafolios/insertar" method="POST">
	    <div class="row">
		  <div class="col-lg-12">
			<div class="form-group">
			    <label for="nomPortafolio">Nombre del portafolio  *</label>
			    <input type="text" class="form-control" id="nompor" name="nombre" placeholder="Portafolio de Diseño Web">
			</div>
		  </div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
				<a href="<?= base_url()?>portafolios/c_portafolios/mostrar" type="submit" class="btn btn-default">Cancelar</a>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
				<input type="submit" class="btn btn-default" name="siguiente" value="Siguiente">
			<div>
	    </div>
   </form>
</div>