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
          
            <div class="tabpanel tab-pane " id="servicio">Servicios
              <div class="panel-body">
                <form action"#" method="#" name="form_servicio">
                <div class="row">
                  <div class="col-lg-12">
                    <form class="navbar-form navbar-left" role="">
                      <?php  

                        foreach ($servicio->result() as $fila) {
                          $checkbox = array(
                            'name'        => 'servicio',
                            'id'          => ''.$fila->id_tipo.'',
                            'value'       => '',
                            'checked'     => FALSE,
                            'style'       => 'margin:10px',
                            'disabled'    => 'disabled'
                            );

                          $textarea = array(
                            'name'        => 'des',
                            'id'          => ''.$fila->id_tipo.'',
                            'value'       => ''.$fila->descripcion.'',
                            'rows'        => '4',
                            'cols'        => '140',
                            'class'       => 'form-control',
                            'disabled'    => 'disabled'
                          );

                      ?>
                            <?= form_checkbox($checkbox);?>
                            <?= form_label($fila->nombre);?><br>
                            <?= form_textarea($textarea);?>
                            
                      <?php
                        }


                      ?>
                    </form>
                  </div>
                </div>
                  <div class="col-lg-12 ">
                    <div class="row text-center">
                      <div class="col-lg-4">
                        
                        <button onClick="activarSer()" style="display:inline" class="btn btn-primary" id="ser-editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
                        <button onClick="desactivarSer()" style="display:none" class="btn btn-default" id="ser-cancelar"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</button>
                        <button type="submit" style="display:none" class="btn btn-primary" id="ser-guardar"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>

                      </div>
                      <div class="col-lg-4">
                        
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
         
            <!-- Fin Panel de tab Servicio --> 
            