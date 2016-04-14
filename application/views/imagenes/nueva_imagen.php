<?php
/*
//Documento: Vista de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
//form
$form = array(
  'name' => 'form_grafico',
  'id'   => 'form_grafico'
  );
?>

<?=@$error?>

<?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>

<?= form_open_multipart('/c_imagenes/subir', $form);?>
<?php
//select option
$estilo = 'class="form-control"';
$tipo_imagen = array();
foreach ($consulta->result() as $fila) 
{
  $tipo_imagen[$fila->id_tipo_img] = $fila->nom_tipo;
}
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
  'type'        => 'file',
  'class'       => 'form-control',
  'rules'       => 'required'
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
    
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <?= form_error('nombre'); ?>
            <?= form_label('Nombre de la imagen: *'); ?>
            <?= form_input($nombre);?>
          </div>
        </div>
        <div class="col-lg-12">

          <br>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
              <?= form_error('userfile'); ?>
              <?= form_label('Selecciona una imagen');?>
              <?= form_upload($imagen); ?>
          </div>
        </div>
        <div class="col-lg-12">

              <?= form_label('Tipo de Imagen') ?>
              <?= form_dropdown('tipo', $tipo_imagen,'1', $estilo) ?>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
          <a href="<?= base_url()?>c_imagenes/mostrar" type="submit" class="btn btn-default">Cancelar</a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
          <input type="submit" class="btn btn-default" name="siguiente" value="Siguiente">
        </div>
      </div>
   </form>
</div>
