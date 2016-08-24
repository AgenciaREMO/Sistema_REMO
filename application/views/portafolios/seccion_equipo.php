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
          'style' => 'display:none',
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
          'data-target' => ''#cargarEquipo'
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
          <td><b>Resaltar</b></td>
          <td><b>Seleccionar</b></td>
        </tr>
      <?php 
        $cont = 1;
        foreach ($obtener_personal->result() as $fila) { //Convertimos la consulta de base de datos en una fila
          $id_personalP = $fila->id_personalP;
          $id_portafolioP = $fila->id_portafolioP;
          $destacado = $fila->destacado;
          $id_personal = $fila->id_personal;
          $nombre = $fila->nombre;
          $puesto = $fila->puesto;
          $especializacion = $fila->especializacion;
          $desc_cv = $fila->desc_cv;

          if($id_portafolioP == '' OR $id_portafolioP == NULL OR $id_portafolioP != $id_portafolio){
      ?>
        <tr>
          <td><?= $cont++ ?></td>
          <td><?= $nombre ?></td> 
          <td><?= $puesto ?></td>
          <td>
            <div class="checkbox" style="text-align:center">
              <?= form_checkbox("id_personal[]", ''.$id_personalP.'', set_checkbox("id_personal[]", ''.$id_personalP.'', FALSE)); ?>
            </div>
          </td>
          <td>
            <div class="checkbox" style="text-align:center">
              <?= form_checkbox("destacado[]", ''.$destacado.'', set_checkbox("destacado[]", ''.$destacado.'', FALSE)); ?>
            </div>
          </td>
        </tr>
      <?php
        }else{
          if (!empty($id_portafolioP) AND !empty($id_personalP) AND empty($destacado)) {
            ?>
              <tr>
                <td><?= $cont++ ?></td>
                <td><?= $nombre ?></td> 
                <td><?= $puesto ?></td>
                <td>
                  <div class="checkbox" style="text-align:center">
                    <?= form_checkbox("id_personal[]", ''.$id_personalP.'', set_checkbox("id_personal[]", ''.$id_personalP.'', TRUE)); ?>
                  </div>
                </td>
                <td>
                  <div class="checkbox" style="text-align:center">
                    <?= form_checkbox("destacado[]", ''.$destacado.'', set_checkbox("destacado[]", ''.$destacado.'', FALSE)); ?>
                  </div>
                </td>
              </tr>
            <?php
              }else{
                if (!empty($id_portafolioP) AND !empty($id_personalP) AND !empty($destacado)) {
                  ?>
                    <tr>
                      <td><?= $cont++ ?></td>
                      <td><?= $nombre ?></td> 
                      <td><?= $puesto ?></td>
                      <td>
                        <div class="checkbox" style="text-align:center">
                          <?= form_checkbox("id_personal[]", ''.$id_personalP.'', set_checkbox("id_personal[]", ''.$id_personalP.'', TRUE)); ?>
                        </div>
                      </td>
                      <td>
                        <div class="checkbox" style="text-align:center">
                          <?= form_checkbox("destacado[]", ''.$destacado.'', set_checkbox("destacado[]", ''.$destacado.'', TRUE)); ?>
                        </div>
                      </td>
                    </tr>
                  <?php
                }
              }
            } 
          } //Fin de Foreach para lista los portafolios
        ?>
      </table>
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
  <?= form_close()?>
  <hr>
  <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
  <?= form_open('portafolios/c_portada/actualizarPortada'.'/'.$id_portafolio);?>
  <div class="row">
    <?php
      foreach ($equipoDisponible->result() as $fila){ {
          //radioButton
        if($checkPortada == $fila->id_img){
          $radioImg = array('name'=>'id_img','id'=>'id_img','value'=>''.$fila->id_img.'','type'=>'radio','disabled'=>'disabled','checked'=>TRUE);
        }else{
          $radioImg = array('name'=>'id_img','id'=>'id_img','value'=>''.$fila->id_img.'','type'=>'radio','disabled'=>'disabled','checked'=>FALSE);
        }
      }
    ?>
  </div>
  <?= form_close()?>
</div>