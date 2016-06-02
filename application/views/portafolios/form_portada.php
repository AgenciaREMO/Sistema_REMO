<?php
/*
//Documento: Vista de creación de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 07 de Marzo del 2016
//Fecha de modificación: 25 de Mayyo del 2016
*/
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <!-- Inicio Tabs -->
      <div role="tabpanel">
        <!-- Navegación tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="#portada" aria-controls="portada" data-toggle="tab" role="tab" >Portada</a></li>
          <li role="presentation"><a href="#servicio" aria-controls="servicio" data-toggle="tab" role="tab">Servicios</a></li>
          <li role="presentation"><a href="#equipo" aria-controls="equipo" data-toggle="tab" >Equipo de trabajo</a></li>
          <li role="presentation"><a href="#experiencia" aria-controls="experiencia" data-toggle="tab" role="tab">Experiencia</a></li>
          <li role="presentation"><a href="#portafolio" aria-controls="portafolio" data-toggle="tab" role="tab">Portafolio</a></li>
          <li role="presentation"><a href="#tab_comentario" aria-controls="tab_comentario" data-toggle="tab" role="tab">Comentario</a></li>
        </ul>
        <!-- Paneles de Tabs -->
        <div class="tab-content">
          <!-- Panel de Tab Portada -->
            <div class="tabpanel tab-pane active" id="portada">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="page-header">Portada Portafolio</h2>
                  </div>
                </div>
                <?=@$error?>
                <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
                <?= form_open('portafolios/c_portada/actualizarPortada'.'/'.$id_portafolio);?>
                
                <div class="row">
                <?php 
                  
                  foreach ($disponible->result() as $fila)
                  { 

                    if($check == $fila->id_img){
                      $radioImg = array(
                        'name'     => 'id_img',
                        'id'       => 'id_img',
                        'value'    => ''.$fila->id_img.'',
                        'type'     => 'radio',
                        'disabled' => 'disabled',
                        'checked'  => TRUE
                        );
                    }else{
                        $radioImg = array(
                        'name'     => 'id_img',
                        'id'       => 'id_img',
                        'value'    => ''.$fila->id_img.'',
                        'type'     => 'radio',
                        'disabled' => 'disabled',
                        'checked'  => FALSE
                        );
                    }

                    /*
                    if($id_img_checked != FALSE){
                      if($id_img_checked == $fila->id_img){
                        $radioImg = array(
                        'name'     => 'id_img',
                        'id'       => 'id_img',
                        'value'    => ''.$fila->id_img.'',
                        'type'     => 'radio',
                        'disabled' => 'disabled',
                        'checked'  => TRUE
                        );
                        echo 'check relacionado';
                      }else{
                        $radioImg = array(
                          'name'     => 'id_img',
                          'id'       => 'id_img',
                          'value'    => ''.$fila->id_img.'',
                          'type'     => 'radio',
                          'disabled' => 'disabled',
                          'checked'  => FALSE
                          );
                           echo 'check false';
                      }
                    }else{
                      if($id_img_checked_default == $fila->id_img){
                          $radioImg = array(
                          'name'     => 'id_img',
                          'id'       => 'id_img',
                          'value'    => ''.$fila->id_img.'',
                          'type'     => 'radio',
                          'disabled' => 'disabled',
                          'checked'  => TRUE
                          );
                          echo 'check default';
                        }else{
                          $radioImg = array(
                          'name'     => 'id_img',
                          'id'       => 'id_img',
                          'value'    => ''.$fila->id_img.'',
                          'type'     => 'radio',
                          'disabled' => 'disabled',
                          'checked'  => FALSE
                          );
                           echo 'check false';
                      }*/
                      
                    
                    
                    

                      //Si quito el if funciona que checked la que esta relacionada con el id de portafolio
                      //Luego quiero checked por default una pero no sale
                     
                    //input
                    
                    /*$radioImg = array(
                      'name'     => 'id_img',
                      'id'       => 'id_img',
                      'value'    => ''.$fila->id_img.'',
                      'checked'  => FALSE,
                      'type'     => 'radio',
                      'disabled' => 'disabled',
                      'checked'  => (set_radio('id_img') === $fila->id_img ? TRUE : FALSE)
                    );*/
                    //botones
                    $editar = array(
                      'onClick' => 'activarPor()',
                      'style'   => 'display:inline',
                      'class'   => 'btn btn-primary',
                      'id'      => 'p-editar',
                      'content' => 'Editar'
                    );
                    $cancelar = array(
                      'onClick' => 'desactivarPor()',
                      'style'   => 'display:none',
                      'class'   => 'btn btn-default',
                      'id'      => 'p-cancelar',
                      'content' => 'Cancelar'
                    );
                    $guardar = array(
                      'style' => 'display:none',
                      'class' => 'btn btn-primary',
                      'id'    => 'p-guardar',
                      'value' => 'Guardar'
                    );
                    $cargar = array(
                      'style' => 'display:inline',
                      'class' => 'btn btn-primary',
                      'id'    => 'p-nueva-s',
                      'content' => 'Nueva portada',
                      'data-toggle' => 'modal',
                      'data-target' => '#cargarPortada'
                      );
                    $cargar2 = array(
                      'style' => 'display:none',
                      'class' => 'btn btn-primary',
                      'id'    => 'p-nueva-n',
                      'content' => 'Nueva portada',
                      'data-toggle' => 'modal',
                      'data-target' => '#cargarPortada'
                      );
                ?>  
                    <?= form_error('id_img'); ?>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                      <?= form_radio($radioImg);?> 
                      <img class="img-responsive img-hover img-thumbnail" src="<?= base_url($fila->url_img)?>" alt="<?= $fila->nom_img ?>" title="<?= $fila->nom_img ?>">
                    </div>
                  
                <?php
                  }
                ?>  
                  </div>          
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <?php echo $pagination;?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-lg-offset-9 ">
                      <?= form_button($editar) ?>
                      <?= form_button($cargar) ?>
                    </div>
                    <div class="col-lg-4 col-lg-offset-8 ">
                      <?= form_button($cancelar) ?>
                      <?= form_submit($guardar) ?>
                      <?= form_button($cargar2) ?>
                    </div>
                  </div>
                <?= form_close() ?>
                <!-- Large modal -->
                  <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargarPortada">Large modal</button>-->
              


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
  '1' => 'Portada'
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

                  <div id="cargarPortada"class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg">
                          <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                              <?=form_open_multipart(base_url()."portafolios/c_portada/validarPortada"."/".$id_portafolio)?>
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
                                        <?= form_dropdown('tipo', $tipo_imagen,'1', $estilo, array('value' => set_value('tipo'),
                                                                                                   'disabled' => 'disabled')) ?>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
                                    <a href="<?= base_url()?>portafolios/c_portada/cargar/<?= $id_portafolio?>"  class="btn btn-default">Cancelar</a>
                                  </div>
                                  <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
                                    <?= form_submit($guardar)?>
                                  </div>
                                </div>
                              <?=form_close()?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>           