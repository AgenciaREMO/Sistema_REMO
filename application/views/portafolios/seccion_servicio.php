<div class="container">
   <div class="row">
    <div class="col-lg-12">
      <h4 class="page-header">Servicios Portafolio</h4>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12">
        <?php echo validation_errors(); ?>
        <?= form_open('portafolios/c_servicio/validarServicio'.'/'.$id_portafolio);?>
          <?php 

            $count = 0;
            //Botones
            $editar = array('onClick' => 'activarSer()','style' => 'display:inline','class' => 'btn btn-primary','id' => 's-editar','content' => 'Editar');
            $cancelar = array('onClick' => 'desactivarSer()','style' => 'display:inline','class' => 'btn btn-default','id' => 's-cancelar','content' => 'Cancelar');
            $guardar = array('style' => 'display:inline','class' => 'btn btn-primary','id' => 's-guardar','value' => 'Guardar'); 
     
            foreach ($consultarServicio->result() as $fila) {
              $id_tipoP =$fila->id_tipoP;
              $id_porta= $fila->id_porta;
              $desc_ser = $fila->desc_ser;
              $id_tipoT = $fila->id_tipoT;
              $nombre = $fila->nombre;
              $descripcion = $fila->descripcion;

              if($id_porta == '' OR $id_porta == NULL OR $id_porta != $id_portafolio){
                $textarea = array('name'=>'descripcion[]',
                                    'id'=>'descripcion[]',
                                    'value'=>''.$descripcion.'',
                                    'rows'=>'3',
                                    'cols'=>'140',
                                    'class'=>'form-control'/*,
                                    'disabled'=>'disabled'*/);
                ?>
                  <div class="checkbox">
                    <?= form_checkbox("servicio[]", ''.$id_tipoT.'', set_checkbox("servicio[]", ''.$id_tipoT.'', FALSE)); ?>
                  </div>
                  <div class="form-group">
                    <?= form_label($nombre);?><br>
                    <?= form_textarea($textarea);?>
                  </div>
                <?php
              }else{
                if($id_porta == $id_portafolio){
                  $textarea = array('name'=>'descripcion[]',
                                      'id'=>'descripcion[]',
                                      'value'=>''.$desc_ser.'',
                                      'rows'=>'3',
                                      'cols'=>'140',
                                      'class'=>'form-control'/*,
                                      'disabled'=>'disabled'*/);
                    ?>
                      <div class="checkbox">
                        <?= form_checkbox("servicio[]", ''.$id_tipoP.'', set_checkbox("servicio[]", ''.$id_tipoP.'', TRUE)); ?>
                      </div>
                      <div class="form-group">
                        <?= form_label($nombre);?><br>
                        <?= form_textarea($textarea);?>
                      </div>
                    <?php
                }else{
                    $textarea = array('name'=>'descripcion[]',
                                      'id'=>'descripcion[]',
                                      'value'=>''.$descripcion.'',
                                      'rows'=>'3',
                                      'cols'=>'140',
                                      'class'=>'form-control'/*,
                                      'disabled'=>'disabled'*/);
                    ?>
                      <div class="checkbox">
                        <?= form_checkbox("servicio[]", ''.$id_tipoT.'', set_checkbox("servicio[]", ''.$id_tipoT.'', FALSE)); ?>
                      </div>
                      <div class="form-group">
                        <?= form_label($nombre);?><br>
                        <?= form_textarea($textarea);?>
                      </div>
                    <?php
                }
              }
            $count++; 
          }
            ?>
          <input type="text" hidden="true" value="<?= $count ?>" id="c" name="cont">
          <br>
          <hr>
          <div class="row">
            <div class="col-lg-1 col-lg-offset-10 ">
              <?= form_button($editar) ?>
            </div>
            <div class="col-lg-3 col-lg-offset-9 ">
              <!--<?= form_button($cancelar) ?>-->
              <!--<?= form_submit($guardar) ?>-->
            </div>
          </div>
          <hr>
          <?= form_close() ?>
        </div>
     
    </div>  
</div>
    