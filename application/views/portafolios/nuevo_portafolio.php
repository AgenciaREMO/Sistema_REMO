<?php
/*
//Documento: Vista de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
<?=@$error?>



<?php

//form
$form = array(
	'name' => 'form_portafolio',
	'id'   => 'form_portafolio'
	);
//input
$nombre = array(
	'name'        => 'nombre',
    'id'          => 'nombre',
    'value'       => set_value('nombre'),
    'maxlength'   => '150',
    'size'        => '50',
    'class'       => 'form-control',
    'placeholder' => ' Ejemplo: Portafolio de Diseño Gráfico'
	);
//textarea
$comentario = array(
	'name'        => 'comentario',
    'id'          => 'comentario',
    'value'       => set_value('comentario'),
    'rows'        => '10',
    'cols'        => '160',
    'class'       => 'form-control',
    'placeholder' => 'Escribe un breve comentario para el cliente sobre el portafolio'
    );
//botones
$guardar = array(
	'name'  => 'guardar',
    'id'    => 'guardarPortafolio',
    'class' => 'btn btn-primary',
    'value' => 'Siguiente'
    );

$cancelar = array(
	'name' => 'cancelar',
	'id'   => 'cancelarPortafolio',
	'class' => 'btn btn-default',
	);
//a
$portafolio = array(
	'title' => 'Portafolios');
?>

 <!-- Contenido de la página -->
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
				  <li><?= anchor('portafolios/c_portafolios/mostrarPortafolio','Portafolios', $portafolio);?></li>
				  <li class="active">Crear portafolio</li>
				</ol>
			</div>
		</div>
		<?= form_open('portafolios/c_portafolios/validar', $form); ?>
	    <div class="row">
		  <div class="col-lg-12">
			<div class="form-group">
				 <?= form_error('nombre'); ?>
				 <?= form_label('Nombre del portafolio: *'); ?>
				 <br>
				 <?= form_input($nombre); ?>
			</div>
			<div class="form-group">
			     <?= form_error('comentario'); ?>	 
				 <?= form_label('Comentario: *'); ?>
				 <br>
				 <?= form_textarea($comentario); ?>
			</div>
		  </div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
	    		<?= anchor('portafolios/c_portafolios/mostrarPortafolio','Cancelar', $cancelar);?>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
				<?= form_submit($guardar)?>
			<div>
	    </div>
	<?= form_close(); ?>
   <!--</form>-->
</div>