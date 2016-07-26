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
              //checkBox
              if($obtenerServicio != FALSE){
                foreach ($obtenerServicio->result() as $row) {
                  $checkServicio = $row->id_tipo;
                  print_r($checkServicio);
                  if($checkServicio == $fila->id_tipo){
                    $textarea = array('name'=>'descripcion[]',
                                      'id'=>'descripcion[]',
                                      'value'=>''.$fila->desc_ser.'',
                                      'rows'=>'3',
                                      'cols'=>'140',
                                      'class'=>'form-control'/*,
                                      'disabled'=>'disabled'*/);
                  ?>
                  <div class="checkbox">
                    <?= form_checkbox("servicio[]", ''.$fila->id_tipo.'', set_checkbox("servicio[]", ''.$fila->id_tipo.'', TRUE)); ?>
                  </div>
                  <div class="form-group">
                    <?= form_label($fila->nombre);?><br>
                    <?= form_textarea($textarea);?>
                  </div>
                  <?php
                  }else{
                    $textarea = array('name'=>'descripcion[]',
                                      'id'=>'descripcion[]',
                                      'value'=>''.$fila->descripcion.'',
                                      'rows'=>'3',
                                      'cols'=>'140',
                                      'class'=>'form-control'/*,
                                      'disabled'=>'disabled'*/);
                  ?>
                    <div class="checkbox">
                      <?= form_checkbox("servicio[]", ''.$fila->id_tipo.'', set_checkbox("servicio[]", ''.$fila->id_tipo.'', FALSE)); ?>
                    </div>
                    <div class="form-group">
                      <?= form_label($fila->nombre);?><br>
                      <?= form_textarea($textarea);?>
                    </div>
                  <?php
                  }
                }
              }else{
                  
              }
            $count++; }
            ?>
          <input type="text" hidden="true" value="<?= $count ?>" id="c" name="cont">
          <br>
          <hr>
          <div class="row">
            <div class="col-lg-1 col-lg-offset-10 ">
              <!--<?= form_button($editar) ?>-->
            </div>
            <div class="col-lg-3 col-lg-offset-9 ">
              <!--<?= form_button($cancelar) ?>-->
              <?= form_submit($guardar) ?>
            </div>
          </div>
          <hr>
          <?= form_close() ?>
        </div>
     
    </div>  
</div>
    