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
               <!-- <form action"#" method="#" name="form_servicio">-->
                <div class="row">
                  <div class="col-lg-12">
                    <?= form_open('portafolios/c_portada/insertarServicio'.'/'.$id_portafolio);?>
                    <!--<form class="" role="" action"#" method="#" name="form_servicio">-->
                      <?php  

                        foreach ($servicio->result() as $fila) {
                          $checkbox = array(
                            'name'        => 'servicio[]',
                            'id'          => 'servicio[]',
                            'value'       => ''.$fila->id_tipo.'',
                            'checked'     => FALSE,
                            'style'       => 'margin:10px',
                            'disabled'    => 'disabled'
                            );

                          $textarea = array(
                            'name'        => 'descripcion[]',
                            'id'          => 'descripcion[]',
                            'value'       => ''.$fila->descripcion.'',
                            'rows'        => '4',
                            'cols'        => '140',
                            'class'       => 'form-control',
                            'disabled'    => 'disabled'
                          );
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
                            'style' => 'display:none',
                            'class' => 'btn btn-default',
                            'id' => 's-cancelar',
                            'content' => 'Cancelar'
                          );
                          $guardar = array(
                            'style' => 'display:none',
                            'class' => 'btn btn-primary',
                            'id' => 's-guardar',
                            'value' => 'Guardar'
                          );
                      ?>
                            <?= form_checkbox($checkbox);?>
                            <?= form_label($fila->nombre);?><br>
                            <?= form_textarea($textarea);?>
                            
                      <?php
                        }


                      ?>
                      <br>
                      <div class="row">
                        <div class="col-lg-1 col-lg-offset-10 ">
                          <?= form_button($editar) ?>
                        </div>
                        <div class="col-lg-3 col-lg-offset-9 ">
                          <?= form_button($cancelar) ?>
                          <?= form_submit($guardar) ?>
                        </div>
                      </div>
                        <?= form_close() ?>
                  </div>
                </div>
                <!--
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
                  </div>-->
              </div>
            </div>
         
            <!-- Fin Panel de tab Servicio --> 
            