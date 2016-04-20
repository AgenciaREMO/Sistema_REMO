<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

</head>
 
<body>
    <!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
    <?=@$error?>
    <?php 
    //select option
    $estilo = 'class="form-control"';
    $tipo_imagen = array(
      '1' => 'Portada',
      '2' => 'Equipo',
      '3' => 'Experiencia',
      '4' => 'Gráfico'
      );
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
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><?= anchor('c_imagenes/mostrar', 'Contenido Gráfico', $contenido); ?></li>
          <li><?= anchor('active', 'Subir Gráfico', $subir); ?></li>
        </ol>
      </div>
    </div>
    <span><?php echo validation_errors(); ?></span>
    <?=form_open_multipart(base_url()."upload/validar")?>
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
                <?= form_error('userfile'); ?>
                <?= form_label('Selecciona una imagen');?>
                <?= form_upload($imagen); ?>
            </div>
        </div><br /><br />
        <div class="col-lg-12">
                <?= form_error('userfile'); ?>
                <?= form_label('Tipo de Imagen') ?>
                <?= form_dropdown('tipo', $tipo_imagen,'1', $estilo, array('value' => set_value('tipo'))) ?>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
              <a href="<?= base_url()?>c_imagenes/mostrar" type="submit" class="btn btn-default">Cancelar</a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
              <?= form_submit($guardar)?>
            </div>
          </div>
       <?=form_close()?>
    </div>
