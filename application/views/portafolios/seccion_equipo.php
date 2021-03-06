<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="page-header">Equipo REMO </h4>
    </div>
  </div>
  <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
  <?= form_open('portafolios/c_equipo/actualizarEquipo'.'/'.$id_portafolio);?>
  <div class="row">
    <div class="col-md-12">
      <?php
        //botones
        $editar = array(
          'onClick' => 'activarEqu()',
          'style'   => 'display:inline',
          'class'   => 'btn btn-primary',
          'id'      => 'eq-editar',
          'content' => 'Editar'
        );
        $cancelar = array(
          'onClick' => 'desactivarEqu()',
          'style'   => 'display:none',
          'class'   => 'btn btn-default',
          'id'      => 'eq-cancelar',
          'content' => 'Cancelar'
        );
        $guardar = array(
          'style' => 'display:inline',
          'class' => 'btn btn-primary',
          'id'    => 'eq-guardar',
          'value' => 'Guardar'
        );
        $cargar = array(
          'style' => 'display:inline',
          'class' => 'btn btn-primary',
          'id'    => 'eq-nueva-s',
          'content' => '<span class="glyphicon glyphicon-plus"></span> Slider',
          'data-toggle' => 'modal',
          'data-target' => '#cargarEquipo'
          );
        $cargar2 = array(
          'style' => 'display:none',
          'class' => 'btn btn-primary',
          'id'    => 'eq-nueva-n',
          'content' => '<span class="glyphicon glyphicon-plus"></span> Slider',
          'data-toggle' => 'modal',
          'data-target' => '#cargarEquipo'
          );
      ?>
      <table class="table table-hover">
        <tr>
          <td><b>No.</b></td>
          <td><b>Colaborador</b></td>
          <td><b>Puesto</b></td>
          <td><b>Seleccionar</b></td>
          <td><b>Resaltar</b></td>
        </tr>
      <?php 
        $cont = 1;
        foreach ($obtener_personal->result() as $fila) { //Convertimos la consulta de base de datos en una fila
          $id_personalP    = $fila->id_personalP;
          $id_portafolioP  = $fila->id_portafolioP;
          $seleccion       = $fila->seleccion;
          $destacado       = $fila->destacado;
          $id_personal     = $fila->id_personal;
          $nombre          = $fila->nombre;
          $puesto          = $fila->puesto;
          $especializacion = $fila->especializacion;
          $desc_cv         = $fila->desc_cv;

          if($id_portafolioP == '' || $id_portafolioP == NULL || empty($id_portafolioP)){
      ?>
        <tr>
          <td><?= $cont++ ?></td>
          <td><?= $nombre ?></td> 
          <td><?= $puesto ?></td>
          <td>
            <div class="checkbox" style="text-align:center">
              <?= form_checkbox("personal[0][]", ''.$id_personal.'', set_checkbox("personal[0][]", ''.$id_personal.'', FALSE)); ?>
            </div>
          </td>
          <td>
            <div class="checkbox" style="text-align:center">
              <?= form_checkbox("personal[1][]", ''.$id_personal.'', set_checkbox("personal[1][]", ''.$id_personal.'', FALSE)); ?>
            </div>
          </td>
        </tr>
      <?php
        }else{
          if (($id_portafolioP == $id_portafolio) && (!empty($id_personalP) && $id_personalP == $id_personal) && (!empty($seleccion) && $seleccion == $id_personalP)  && ($destacado == '' || $destacado == NULL || empty($destacado) || $destacado == 0)) {
            ?>
              <tr>
                <td><?= $cont++ ?></td>
                <td><?= $nombre ?></td> 
                <td><?= $puesto ?></td>
                <td>
                  <div class="checkbox" style="text-align:center">
                    <?= form_checkbox("personal[0][]", ''.$id_personal.'', set_checkbox("personal[0][]", ''.$id_personal.'', TRUE)); ?>
                  </div>
                </td>
                <td>
                  <div class="checkbox" style="text-align:center">
                    <?= form_checkbox("personal[1][]", ''.$id_personal.'', set_checkbox("personal[1][]", ''.$id_personal.'', FALSE)); ?>
                  </div>
                </td>
              </tr>
            <?php
              }else{
                if (($id_portafolioP == $id_portafolio) && (!empty($id_personalP) && $id_personalP == $id_personal) && !empty($destacado) && $destacado == 1) {
                  ?>
                    <tr>
                      <td><?= $cont++ ?></td>
                      <td><?= $nombre ?></td> 
                      <td><?= $puesto ?></td>
                      <td>
                        <div class="checkbox" style="text-align:center">
                          <?= form_checkbox("personal[0][]", ''.$id_personal.'', set_checkbox("personal[0][]", ''.$id_personal.'', TRUE)); ?>
                        </div>
                      </td>
                      <td>
                        <div class="checkbox" style="text-align:center">
                          <?= form_checkbox("personal[1][]", ''.$destacado.'', set_checkbox("personal[1][]", ''.$destacado.'', TRUE)); ?>
                        </div>
                      </td>
                    </tr>
                  <?php
                }
              }
            } 
          } //Fin de Foreach para lista del personal de la agencia
        ?>
      </table>
    </div>
  </div>
  <hr>
  <div class="row">
    <?php
      foreach ($obtener_slide->result() as $fila){ 
        $id_porta     = $fila->id_porta;
        $id_imgP      = $fila->id_imgP;
        $id_imgI      = $fila->id_imgI;
        $id_tipo_imgI = $fila->id_tipo_imgI;
        $nom_img      = $fila->nom_img;
        $url_img      = $fila->url_img;
        $url_thu      = $fila->url_thu;
        $id_tipo_imgT = $fila->id_tipo_imgT;
        $nom_tipo     = $fila->nom_tipo;
        $radioFalse= array('name'=>'id_img','id'=>''.$id_imgI.'','value'=>''.$id_imgI.'','type'=>'radio',/*'disabled'=>'disabled',*/'checked'=>FALSE);
        $radioTrue = array('name'=>'id_img','id'=>''.$id_imgP.'','value'=>''.$id_imgP.'','type'=>'radio',/*'disabled'=>'disabled',*/'checked'=>TRUE);

          if($id_porta == '' OR $id_porta == NULL OR $id_porta != $id_portafolio){
            ?>
            <div class="col-lg-2 col-xs-6 col-sm-4 col-md-3 img-rounded text-center">
              <div class="checkbox">
                <?= form_radio($radioFalse); ?>
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
                        <?= form_radio($radioTrue); ?>
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
                        <?= form_radio($radioFalse); ?>
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
        <?= form_close()?>
        
        <hr>

        <!-- Modal carga slider de equipo-->
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargarPortada">Large modal</button>-->
    <?=@$error?>
    <?php
    //form
    $form = array('name'=>'form_grafico','id'=>'form_grafico');
    //select option
    $estilo = 'class="form-control"';
    $tipo_imagen = array('2'=>'Equipo');
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
                       'placeholder'=>' Ejemplo: Agencia REMO');

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
    <div id="cargarEquipo" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subir slider de equipo de REMO</h4>
          </div>
          <div class="modal-body">
            <?=form_open_multipart(base_url()."portafolios/c_equipo/validarEquipo"."/".$id_portafolio)?>
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
                <a href="<?= base_url()?>portafolios/c_equipo/cargarEquipo/<?= $id_portafolio?>"  class="btn btn-default">Cancelar</a>
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
<style type="text/css">
  $('.id_personal:checked').each(
    function() {
        alert("El checkbox con valor " + $(this).val() + " está seleccionado");
    }
  );
</style>