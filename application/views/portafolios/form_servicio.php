<?php
/*
//Documento: Vista Sección Servicios
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
<!-- Panel del Tab Servicio -->
<div class="tabpanel tab-pane " id="servicio">
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <?php echo validation_errors(); ?>
        <?= form_open('portafolios/c_servicio/validarServicio'.'/'.$id_portafolio);?>
          <?php  
            $count = 0;
            foreach ($servicio->result() as $fila) {
              //Botones
              $editar = array(
                'onClick' => 'activarSer()',
                'style' => 'display:inline',
                'class' => 'btn btn-primary',
                'id' => 's-editar',
                'content' => 'Editar'
              );
              $cancelar = array(
                'onClick' => 'desactivarSer()',
                'style' => 'display:inline',
                'class' => 'btn btn-default',
                'id' => 's-cancelar',
                'content' => 'Cancelar'
              );
              $guardar = array(
                'style' => 'display:inline',
                'class' => 'btn btn-primary',
                'id' => 's-guardar',
                'value' => 'Guardar'
              ); 
              $textarea = array(
                'name'        => 'descripcion[]',
                'id'          => 'descripcion[]',
                'value'       => ''.$fila->descripcion.'',
                'rows'        => '3',
                'cols'        => '140',
                'class'       => 'form-control'/*,
                'disabled'    => 'disabled'*/
              );

            /*  $checkbox = array(
                'name' => 'servicio[]', 
                'value' => set_checkbox("servicio[]", ''.$fila->id_tipo.''),
                'id' => 'servicio[]',
               // 'disabled'    => 'disabled'
                );*/
          ?>
          <div class="checkbox">
            <?php
            //echo form_checkbox($checkbox);
            echo form_checkbox("servicio[]", ''.$fila->id_tipo.'', set_checkbox("servicio[]", ''.$fila->id_tipo.''));
            ?>
          </div>
          <div class="form-group">
            <?= form_label($fila->nombre);?><br>
            <?= form_textarea($textarea);?>
          </div>
          <?php
            $count++; }
          ?>
          <input type="text" hidden="true" value="<?= $count ?>" id="c" name="cont">
          <br>
          <div class="row">
            <div class="col-lg-1 col-lg-offset-10 ">
              <!--<?= form_button($editar) ?>-->
            </div>
            <div class="col-lg-3 col-lg-offset-9 ">
              <!--<?= form_button($cancelar) ?>-->
              <?= form_submit($guardar) ?>
            </div>
          </div>
          <?= form_close() ?>
        </div>
     
    </div>
  </div>
</div>
         
            <!-- Fin Panel de tab Servicio --> 
            