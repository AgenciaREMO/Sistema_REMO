<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="page-header">Portada Portafolio</h4>
    </div>
  </div>
  <?=@$error?>
  <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
  <?php 
  //botones
  $editar   = array('onClick'=>'activarPor()',
                    'style'=>'display:inline',
                    'class'=>'btn btn-primary',
                    'id'=>'p-editar','content'=>
                    '<span class="glyphicon glyphicon-edit"></span>  Editar');

  $cancelar = array('onClick'=>'desactivarPor()',
                    'style'=>'display:none','class'=>
                    'btn btn-default','id'=>'p-cancelar',
                    'content'=>'<span class="glyphicon glyphicon-floppy-remove"></span> Cancelar');

  $guardar  = array('style'=>'display:none',
                    'class'=>'btn btn-primary',
                    'id'=>'p-guardar','value'=>'Guardar');

  $cargar   = array('style'=>'display:inline',
                    'class'=>'btn btn-primary',
                    'id'=>'p-nueva-s','content'=>
                    '<span class="glyphicon glyphicon-plus"></span> Portada',
                    'data-toggle'=>'modal','data-target'=>'#cargarPortada');

  $cargar2  = array('style'=>'display:none',
                    'class'=>'btn btn-primary',
                    'id'=>'p-nueva-n',
                    'content'=>'<span class="glyphicon glyphicon-plus"></span> Portada',
                    'data-toggle'=>'modal','data-target'=>'#cargarPortada');

  if($disponiblePortada != FALSE){
    ?>
    <?= form_open('portafolios/c_portada/actualizarPortada'.'/'.$id_portafolio);?>
      <div class="row">
    <?php
      foreach ($disponiblePortada->result() as $fila){ 
        //radioButton
        if($checkPortada == $fila->id_img){
          $radioImg = array('name'=>'id_img','id'=>'id_img','value'=>''.$fila->id_img.'','type'=>'radio','disabled'=>'disabled','checked'=>TRUE);
        }else{
          $radioImg = array('name'=>'id_img','id'=>'id_img','value'=>''.$fila->id_img.'','type'=>'radio','disabled'=>'disabled','checked'=>FALSE);
        }
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
          <?php echo $paginationPortada;?>
        </div>
      </div>
      <hr>
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
      <hr> 
      <?= form_close() ?>
      <?php
    }else{
      ?>
      <div>
        <div class="col-lg-2 col-lg-offset-10 ">
          <?= form_button($cargar) ?>
        </div>
      </div>
      <hr> 
      <?php
    }
    ?>
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargarPortada">Large modal</button>-->
    <?=@$error?>
    <?php
    //form
    $formcargaportada = array('name'=>'formcargaportada','id'=>'formcargaportada');
    //select option
    $estilo = 'class="form-control"';
    $tipo_imagen = array('1'=>'Portada');
    /*foreach ($consulta->result() as $fila) 
    {
      $tipo_imagen[$fila->id_tipo_img] = $fila->nom_tipo;
    }*/
    //inputs
    $nombre    = array('name'=>'nombre',
                       'id'=>'nombre',
                       'value'=>set_value('nombre'),
                       'maxlength'=>'150',
                       'size'=> '50','class'=> 
                       'form-control','placeholder'=>' Ejemplo: Logotipo de REMO');

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
    <div id="cargarPortada"class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subir portada</h4>
          </div>
          <div class="modal-body">
            <?=form_open_multipart(base_url()."portafolios/c_portada/validarPortada"."/".$id_portafolio, $formcargaportada)?>
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
                <?= form_dropdown('tipo', $tipo_imagen,'1', $estilo, array('value'=>set_value('tipo'),'disabled'=>'disabled')) ?>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-offset-8 col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                <a href="<?= base_url()?>portafolios/c_portada/cargarPortada/<?= $id_portafolio?>"  class="btn btn-default">Cancelar</a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                <?= form_submit($guardar)?>
              </div>
            </div>
            <?=form_close()?>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  //Limpia la modales cuando se ocultan
    $(document.body).on('hidden.bs.modal', function () {
      $('#formcargaportada')[0].reset();
    });
</script>