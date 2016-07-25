<?php
/*
//Documento: Vista de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
<!--REMO CSS-->
  <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
  <script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<!--BOOTSTRAP CSS-->
<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
<link href="<?= base_url('css/modern-business.css') ?>" rel="stylesheet">
<link href="<?= base_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
<?=@$error?>
<?php
//form
$form = array(
  'name' => 'form_grafico',
  'id'   => 'form_grafico'
  );
//select option
$estilo = 'class="form-control"';
$tipo_imagen = array(
  '1' => 'Portada',
  '2' => 'Equipo',
  '3' => 'Experiencia',
  '4' => 'Gráfico'
  );
/*foreach ($consulta->result() as $fila) 
{
  $tipo_imagen[$fila->id_tipo_img] = $fila->nom_tipo;
}*/
//inputs
$nombre = array(
  'name'        => 'nombre',
  'id'          => 'nombre',
  'value'       => set_value('nombre'),
  'maxlength'   => '150',
  'size'        => '50',
  'class'       => 'form-control',
  'placeholder' => ' Ejemplo: Logotipo de REMO'
  );
$imagen = array(
  'name'        => 'userfile',
  'id'          => 'userfile',
  'value'       => set_value('userfile'),
  'type'        => 'file',
  'class'       => 'form-control',
  'rules'       => 'required'
  );
  //botones
  $guardar = array(
    'name'  => 'guardar',
    'id'    => 'guardarGrafico',
    'class' => 'btn btn-primary',
    'value' => 'Guardar'
    );

  $cancelar = array(
    'name' => 'cancelar',
    'id'   => 'cancelarCarga',
    'class' => 'btn btn-default',
    'value' => 'Cancelar'
    );
//a
$contenido = array(
    'title' => 'Contenido Gráfico'
    );
$subir = array(
    'title' => 'Subir Gráfico'
    );
  ?>

 <!-- Contenido de la página -->

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><?= anchor('c_imagenes/mostrar', 'Contenido Gráfico', $contenido); ?></li>
          <li><?= anchor('active', 'Subir Gráfico', $subir); ?></li>
        </ol>
      </div>
    </div>
    <?=form_open_multipart(base_url()."c_imagenes/validar")?>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <?= form_error('nombre'); ?>
            <?= form_label('Nombre de la imagen: *'); ?>
            <?= form_input($nombre);?>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
              <?= form_label('Selecciona una imagen');?>
              <?= form_upload($imagen); ?>
          </div>
        </div>
        <div class="col-lg-12">
              <?= form_label('Tipo de Imagen') ?>
              <?= form_dropdown('tipo', $tipo_imagen,'1', $estilo, array('value' => set_value('tipo'))) ?>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
          <a href="<?= base_url()?>c_imagenes/cargarListaImagenes" type="submit" class="btn btn-default">Cancelar</a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
          <?= form_submit($guardar)?>
        </div>
      </div>
  <?=form_close()?>
</div>
