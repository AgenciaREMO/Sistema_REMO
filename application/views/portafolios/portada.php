<!-- <button type="submit" style="display:none" class="btn btn-default" id="p-guardar">Guardar</button>
                            <button onClick="desactivarPor()" style="display:none" class="btn btn-default" id="p-cancelar"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</button>
                            <button onClick="activarPor()" style="display:inline" class="btn btn-primary" id="p-editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
                            -->
                        
                            
                     
                      
                      <!--<div class="row">
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
                      </div>-->
                      <!--<div class="row">
                        <?php
                          if($consultar != FALSE){
                        ?>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            //<a class="btn btn-primary btn-sm btn-block" href="javascript:void(0)" onclick="insertarPortada('<?= $id_portafolio , $fila->id_img?>')"><i class="fa fa-times"></i></a>
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
                    

                        // Inicio Modal seleccionar portada o editar
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
                                //<form id="insertar_editar" onsubmit="return modificarPortada();">
                                 <div class="row">
                                    <?php 
                                      foreach ($disponible->result() as $fila)
                                      //  while ($fila = mysql_fetch_array($consulta, MYSQL_ASSOC)) {
                                                          {   
                    									  

										
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
                                    //<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" name="subir" value="Guardar">
                                </form>
                              </div>
                            </div>
                          </div> 
                        </div>
                        // Fin Modal seleccionar portada
                      </div>-->
                      <!--<div class="col-lg-1 col-lg-offset-11 ">
                        <div class="row">
                          <div class="col-lg-1">
                            <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                          </div>
                          <div class="col-lg-1">
                            <a href="#"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></a>
                          </div>
                        </div>
                      </div>-->
                </div>
              </div>

            
            <!-- Fin Panel de tab Portada --> 
                        <!-- Fin Panel de tab Portada 
<script type="text/javascript">
  $(document).on("ready", inicio);

  function inicio(){
    $("#g-portada").submit(function(event){
        alert("Estoy aqui");
        event.preventDefault(); //Previene que se ejecute la acción del formulario

    });
  }
</script>

 
            <script type="text/javascript">
              $(document).ready(function(){
                $('#form_portada').submit(function(e){
                  e.preventDefault(); //Previene la ejecución del código
                  var data = $(this).serializeArray(); //Guardamos en una variable data el formulario

                  //Método AJAX para insertar portada
                  $ajax.({
                    url:"<?= base_url('portafolios/c_portada/guardar')?>" + "/" + id, //action
                    type: 'POST', //method
                    dataType: 'json', //devuelve el arreglo en json
                    data:'data', 
                  })

                  //Cuando la función sea true
                  .done(function(){
                    console.log("success");
                    $('span').html("Correcto");
                  })
                  //Cuando la función sea false
                  .fail(function(){
                    console.log("error");
                    $('span').html("Falso");
                  })
                  //Siempre y cuando se termine el request sin importar si es true o false
                  .always(function(){
                    console.log("complete");
                  });

                })
              });
            </script>--> 
