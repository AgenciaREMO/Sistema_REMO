<?php
/*
//Documento: Vista Sección Experiencia
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
 <!-- Panel del Tab Experiencia -->
              <div class="tabpanel tab-pane " id="experiencia">
                <div class="panel-body">
                  <form action"#" method="#" name="form_experiencia">
                  <div class="row">
                    <div class="col-md-12 col-sm-6">
                      <h5>Elige las imagénes que deseas incluir  como experiencia</h5>
                    </div>
                  </div>
                  <?=@$error?>
                  <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
                  <?= form_open();?>
                    <div class="row">
                    <?php 
                      
                      foreach ($disponibleExperiencia->result() as $fila)
                      { 

                        if($checkExperiencia == $fila->id_img){
                          $radioImg = array(
                            'name'     => 'id_img',
                            'id'       => 'id_img',
                            'value'    => ''.$fila->id_img.'',
                            'type'     => 'checkbox',
                            'disabled' => 'disabled',
                            'checked'  => TRUE
                            );
                        }else{
                            $radioImg = array(
                            'name'     => 'id_img',
                            'id'       => 'id_img',
                            'value'    => ''.$fila->id_img.'',
                            'type'     => 'checkbox',
                            'disabled' => 'disabled',
                            'checked'  => FALSE
                            );
                        }

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
                          <?= form_checkbox($radioImg);?> 
                          <img class="img-responsive img-hover img-thumbnail" src="<?= base_url($fila->url_img)?>" alt="<?= $fila->nom_img ?>" title="<?= $fila->nom_img ?>">
                        </div>
                      
                    <?php
                      }
                    ?>  
                      </div>    

                  <div class="row">
                    <!-- Inicio de modal -->
                    <div class="col-lg-2">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#basicModal2">Agregar slider</button>
                    </div><br />
                    <div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Agregar logotipo de experiencia</h4>
                          </div>
                          <div class="modal-body">
                            <form action="php/subirExperiencia.php" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="file">Selecciona logotipo</label>
                                <input type="file" id="img" name="imagen">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <form action="php/subirExperiencia.php" method="POST" enctype="multipart/form-data">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <input type="submit" class="btn btn-primary" name="subir" value="Guardar">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-lg-offset-11 ">
                    <div class="row">
                      <div class="col-lg-1">
                        <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      </div>
                      <div class="col-lg-1">
                        <a href="#"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></a>
                      </div>
                    </div>
                  </div>
              </form>
              </div>
            </div>
         
          <!-- Fin Panel de tab Experiencia --> 
            