<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="page-header">Contenido gráfico</h4>
    </div>
  </div>
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <h5>Selecciona las imagenes que se incluirán como contenido gráfico en el portafolio</h5>
        </div>
    </div>
    <?=@$error?>
    <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
    <?= form_open('portafolios/c_contenido/actualizarContenido'.'/'.$id_portafolio);?>
    <div class="row">
        <?php 

          $count = 0;
          //botones
          $editar   = array('onClick'=>'activarPor()',
                            'style'=>'display:inline',
                            'class'=>'btn btn-primary',
                            'id'=>'p-editar',
                            'content'=>'Editar');

          $cancelar = array('onClick'=>'desactivarPor()',
                            'style'=>'display:none',
                            'class'=>'btn btn-default',
                            'id'=>'p-cancelar',
                            'content'=>'Cancelar');

          $guardar  = array('style'=>'display:inline',
                            'class'=>'btn btn-primary',
                            'id'=>'p-guardar',
                            'value'=>'Guardar');

          $cargar   = array('style'=>'display:inline',
                            'class'=>'btn btn-primary',
                            'id'=>'p-nueva-s',
                            'content'=>'<span class="glyphicon glyphicon-plus"></span> Gráfico',
                            'data-toggle'=>'modal',
                            'data-target'=>'#cargarGrafico');

          $cargar2  = array('style'=>'display:none',
                            'class'=>'btn btn-primary',
                            'id'=>'p-nueva-n',
                            'content'=>'<span class="glyphicon glyphicon-plus"></span> Gráfico',
                            'data-toggle'=>'modal',
                            'data-target'=>'#cargarGrafico');

                  foreach ($obtener_pagina->result() as $fila){ 
                     $id_porta     = $fila->id_porta;
                     $id_imgP      = $fila->id_imgP;
                     $id_imgI      = $fila->id_imgI;
                     $id_tipo_imgI = $fila->id_tipo_imgI;
                     $nom_img      = $fila->nom_img;
                     $url_img      = $fila->url_img;
                     $url_thu      = $fila->url_thu;
                     $id_tipo_imgT = $fila->id_tipo_imgT;
                     $nom_tipo     = $fila->nom_tipo;

          if($id_porta == '' OR $id_porta == NULL OR $id_porta != $id_portafolio){
                  ?>
                  <div class="col-lg-2 col-xs-6 col-sm-4 col-md-3 img-rounded text-center">
                    <div class="checkbox">
                      <?= form_checkbox("grafico[]", ''.$id_imgI.'', set_checkbox("grafico[]", ''.$id_imgI.'', FALSE)); ?>
                    </div>
                    <br/>
                    <img class="img-responsive img-hover img-thumbnail" src="<?= base_url($url_img)?>" alt="<?= $nom_img ?>" title="<?= $nom_img ?>">
                  </div>
                  <?php
                }else{
                  # code...
                  if ($id_porta == $id_portafolio) {
                    # code...
                    ?>
                    <div class="col-lg-2 col-xs-6 col-sm-4 col-md-3 img-rounded text-center">
                      <div class="checkbox">
                        <?= form_checkbox("grafico[]", ''.$id_imgP.'', set_checkbox("grafico[]", ''.$id_imgP.'', TRUE)); ?>
                      </div>
                      <br/>
                      <img class="img-responsive img-hover img-thumbnail" src="<?= base_url($url_img)?>" alt="<?= $nom_img ?>" title="<?= $nom_img ?>">
                    </div>
                    <?php
                  }else{
                    # code...
                    ?>
                    <div class="col-lg-2 col-xs-6 col-sm-4 col-md-3 img-rounded text-center">
                      <div class="checkbox">
                        <?= form_checkbox("grafico[]", ''.$id_imgI.'', set_checkbox("grafico[]", ''.$id_imgI.'', FALSE)); ?>
                      </div>
                      <br/>
                      <img class="img-responsive img-hover img-thumbnail" src="<?= base_url($url_img)?>" alt="<?= $nom_img ?>" title="<?= $nom_img ?>">
                    </div>
                    <?php
                  }
                }
        }
        ?>  
    </div> 
    <div class="row">
       <div class="col-lg-12 text-center">
         <?php echo $paginationContenido;?>
       </div>
    </div>
     <hr>
      <div class="row">
        <div class="col-lg-3 col-lg-offset-9 ">
          <?= form_button($editar) ?>
          <?= form_button($cargar) ?>
        </div>
        <div class="col-lg-4 col-lg-offset-8 ">
          <!--<?= form_button($cancelar) ?>
          <?= form_submit($guardar) ?>
          <?= form_button($cargar2) ?>-->
        </div>
      </div>
      <hr>   
       <?= form_close() ?>
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargarPortada">Large modal</button>-->
    <?=@$error?>
    <?php
    //form
    $form = array('name'=>'form_grafico','id'=>'form_grafico');
    //select option
    $estilo = 'class="form-control"';
    $tipo_imagen = array('4'=>'Grafico');
    /*foreach ($consulta->result() as $fila) 
    {
      $tipo_imagen[$fila->id_tipo_img] = $fila->nom_tipo;
    }*/
    //inputs
    $nombre    = array('name'=>'nombre',
                       'id'=>'nombre',
                       'value'=>set_value('nombre'),
                       'maxlength'=>'150',
                       'size'=> '50',
                       'class'=> 'form-control',
                       'placeholder'=>' Ejemplo: Logotipo de REMO');

    $imagen    = array('name'=>'userfile',
                       'id'=>'userfile',
                       'value'=> set_value('userfile'),
                       'type'=>'file',
                       'class'=>'form-control',
                       'rules'=>'required');
    //botones
    $guardar   = array('name'=>'guardar',
                       'id'=>'guardarGrafico',
                       'class'=>'btn btn-primary',
                       'value'=>'Guardar');

    $cancelar  = array('name'=>'cancelar',
                       'id'=>'cancelarCarga',
                       'class'=>'btn btn-default',
                       'value'=>'Cancelar');
    //a
    $contenido = array('title'=>'Contenido Gráfico');
    
    $subir     = array('title' => 'Subir Gráfico');
    ?>
    <div id="cargarGrafico"class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subir logo de experiencia</h4>
          </div>
          <div class="modal-body">
            <?=form_open_multipart(base_url()."portafolios/c_contenido/validarContenido"."/".$id_portafolio)?>
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
                <?= form_dropdown('tipo', $tipo_imagen,'4', $estilo, array('value'=>set_value('tipo'),'disabled'=>'disabled')) ?>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-offset-8 col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                <a href="<?= base_url()?>portafolios/c_contenido/cargarContenido/<?= $id_portafolio?>"  class="btn btn-default">Cancelar</a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                <?= form_submit($guardar)?>
              </div>
            </div>
            <?=form_close()?>
          </div>
         <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div> -->
        </div>
      </div>
    </div>
</div>