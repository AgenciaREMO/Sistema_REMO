<?php
/*
//Documento: Vista de creación de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 07 de Marzo del 2016
//Fecha de modificación: 
*/
?>

<div class="container">
  <form>
  <div class="row">
      <div class="col-lg-12">
        <!-- Inicio Tabs -->
        <div role="tabpanel">
          <!-- Navegación tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#portada" aria-controls="portada" data-toggle="tab" role="tab" >Portada</a></li>
            <li role="presentation"><a href="#servicio" aria-controls="servicio" data-toggle="tab" role="tab">Servicios</a></li>
            <li role="presentation"><a href="#equipo" aria-controls="equipo" data-toggle="tab" >Equipo de trabajo</a></li>
            <li role="presentation"><a href="#experiencia" aria-controls="experiencia" data-toggle="tab" role="tab">Experiencia</a></li>
            <li role="presentation"><a href="#portafolio" aria-controls="portafolio" data-toggle="tab" role="tab">Portafolio</a></li>
            <li role="presentation"><a href="#tab_comentario" aria-controls="tab_comentario" data-toggle="tab" role="tab">Comentario</a></li>
          </ul>
          <!-- Paneles de Tabs -->
          <div class="tab-content">
            <!-- Panel de Tab Portada -->
            
              <div class="tabpanel tab-pane active" id="portada">
                <div class="panel-body">
                  <!--<form action"#" method="#" name="form_portada">-->
                  <div class="row">
                    <div class="col-lg-12">
                      <h2 class="page-header">Portada Portafolio</h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <a href="#">
                        
                        <img class="img-responsive img-portfolio img-hover img-thumbnail" id="<?= $id_img ?>" src="<?= base_url($url_img)?>" alt="<?= $nom_img ?>" title="Portada actual">
                      </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="row">
                        <div class="col-lg-12">
                          <h5>Portadas anteriores</h5>
                        </div>
                        <?php 
                        if($anterior != FALSE){
                          foreach ($anterior->result() as $fila)
                          {
                            $id_imagen = $fila->id_img;
                            $nombre = $fila->nom_img;
                            $url_imagen = $fila->url_img;
                            //Portadas cargadas de base de datos
                        ?>
                          <div class="col-sm-12 col-md-6">
                            <img class="img-responsive img-portfolio img-hover img-thumbnail" id="<?= $id_imagen ?>" src="<?= base_url($url_imagen)?>" alt="<?= $nombre ?>" title="<?= $nombre ?>">
                          </div> 
                        <?php
                          }
                        }
                        else{
                          //Portadas en caso de no existir en base de datos registros
                        ?>
                        <div class="col-sm-12 col-md-6">
                          <img class="img-responsive img-portfolio img-hover img-thumbnail" src="<?= base_url()?>img/portafolios/portada/2.jpg" alt="Portada anteriores" title="Portada anteriores">
                        </div>
                        <div class="col-sm-12 col-md-6">
                          <img class="img-responsive img-portfolio img-hover img-thumbnail" src="<?= base_url()?>img/portafolios/portada/3.jpg" alt="Portada anteriores" title="Portada anteriores">
                        </div>
                        <?php
                        }
                        ?>                  
                      </div>
                      <div class="row">
                        <?php
                          if($consultar != FALSE){
                        ?>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <!--<a class="btn btn-primary btn-sm btn-block" href="javascript:void(0)" onclick="insertarPortada('<?= $id_portafolio , $fila->id_img?>')"><i class="fa fa-times"></i></a>-->
                            <button id="editar" type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modalSP">Editar</button>
                          </div>
                        <?php
                           
                          }else{
                        ?>
                          <div class="col-sm-6 col-md-4" col-lg-4>
                            <button id="seleccionar" type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modalSP"><span class="
glyphicon glyphicon-ok"></span>  Seleccionar</button>
                          </div>
                        <?php    
                          }
                        ?>
                          <div class="col-sm-6 col-md-4" col-lg-4>
                            <button id="nueva" type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modalAP"><span class="
glyphicon glyphicon-plus"></span>  Nueva</button>
                          </div>
                    

                        <!-- Inicio Modal seleccionar portada o editar--> 
                        <div class="modal fade" id="modalSP" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Seleccionar portada</h4>
                              </div>
                              <div class="modal-body">
                              <?php 
                                //form
                                $form = array(
                                  'name' => 'form_portada',
                                  'id'   => 'form_portada'
                                  );
                              ?>
                                <?= form_open('portafolios/c_portada/validar', $form); ?>
                                <!--<form id="insertar_editar" onsubmit="return modificarPortada();">-->
                                 <div class="row">
                                    <?php 
                                      foreach ($disponible->result() as $fila)
                                      //  while ($fila = mysql_fetch_array($consulta, MYSQL_ASSOC)) {
                                                          {   
                    									  $id = array(
                    										'name' => 'id_img',
                    										'id' => 'id_img',
                    										'readonly' => 'readonly',
                    										'style' => 'visibility: hidden; height:1px;',
                    										'rules' => 'required'
                                        );
                    										$proceso = array(
                    										'name' => 'proceso',
                    										'id' => 'proceso',
                    										'rules' => 'required',
                    										'style' => 'visibility: hidden; height:1px;',
                    										'readonly' => 'readonly',
                    										);
                    										$radioImg = array(
                                        'name' => 'id_img',
                                        'id' => 'id_img',
                                        'value' => "$fila->id_img",
                                        'checked' => FALSE,
                                        'type' => 'radio'
                                        );
                    										$guardar = array(
                    										'name' => 'guardar',
                    										'id' => 'guardar',
                    										'value' => 'Guardar',
                    										'class' => 'btn btn-success',
                    										);
                    										$editar = array(
                    										'name' => 'editar',
                    										'id' => 'editar',
                    										'value' => 'Editar',
                    										'class' => 'btn btn-warning',
                    										);
										
                                    ?>
                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                                      <div class="form-group">
                                      	<?= form_input($id); ?>
                                      </div>
                                      <div class="checkbox">
                                        <?= form_radio($radioImg);?>
                                      <img id="imagen" class="img-responsive img-portfolio img-hover img-thumbnail" src="<?= base_url($fila->url_thu)?>" alt="<?= $fila->nom_img ?>" title="<?= $fila->nom_img ?>">
                                       </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                                    	<div id="mensaje"></div>
                                    </div>
                                    <?php
                                      }
                                    ?>
                                  </div>
                              </div>
                              <div class="modal-footer">
                              		<?= form_submit($guardar);?>
                                    <?= form_submit($editar);?>
                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" name="subir" value="Guardar">-->
                                </form>
                              </div>
                            </div>
                          </div> 
                        </div>
                        <!-- Fin Modal seleccionar portada --> 
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
                        </div>
                  </div>

                </div>
              </div>
            
            <!-- Fin Panel de tab Portada -->  
            