
 <div class="container">
        <div class"row">
         <div class="col-lg-12">

          Crear portafolios | Edita las secciones
         </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                  <!-- Nav tabs -->
                  <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation"class="active"><a href="#portada" aria-controls="portada" data-toggle="tab" role="tab" >Portada</a></li>
                      <li role="presentation"><a href="#servicio" aria-controls="servicio" data-toggle="tab" role="tab">Servicios</a></li>
                      <li role="presentation"><a href="#equipo" aria-controls="equipo" data-toggle="tab" >Equipo de trabajo</a></li>
                      <li role="presentation"><a href="#experiencia" aria-controls="experiencia" data-toggle="tab" role="tab">Experiencia</a></li>
                      <li role="presentation"><a href="#portafolio" aria-controls="portafolio" data-toggle="tab" role="tab">Portafolio</a></li>
                      <li role="presentation"><a href="#comentario" aria-controls="comentario" data-toggle="tab" role="tab">Comentario</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <!-- Portada Tab panes -->
                      <div class="tabpanel tab-pane active" id="portada">
                           <div class="panel-body">
                              <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="page-header">Portada Portafolio</h2>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                  <a href="#">
                                      <img class="img-responsive img-portfolio img-hover img-thumbnail" src="<?= base_url()?>img/portafolios/portada/1.jpg" alt="Portada actual" title="Portada actual">
                                  </a>
                                </div>
                                  <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                          <div class="col-lg-12">
                                            <h5>Portadas anteriores</h5>
                                        </div>
                                          <div class="col-sm-12 col-md-6">
                                            <img class="img-responsive img-portfolio img-hover img-thumbnail" src="<?= base_url()?>img/portafolios/portada/2.jpg" alt="Portada anteriores" title="Portada anteriores">
                                          </div>
                                          <div class="col-sm-12 col-md-6">
                                            <img class="img-responsive img-portfolio img-hover img-thumbnail" src="<?= base_url()?>img/portafolios/portada/3.jpg" alt="Portada anteriores" title="Portada anteriores">
                                          </div>                   
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-12">
                                            <h5>Seleccionar portada</h5>
                                        </div>
                                          <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalPortada">Agregar portada</button>
                                          </div>  
                                          <div class="modal fade" id="modalPortada" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title" id="myModalLabel">Agregar portada</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="php/subirPortada.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="file">Selecciona imagen de portada</label>
                                                          <input type="file" id="img" name="imagen">
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                      <input type="submit" class="btn btn-primary" name="subir" value="Guardar">
                                                  </form>
                                                  </div>
                                              </div>
                                            </div>
                                          </div>  
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 col-sm-offset-9">
                                            <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a><br />
                                              <a href="#"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></a>
                                          </div>    
                                      </div>
                                </div>
                              </div>
                            </div>


                      </div>
                      <!-- Servicio Tab panes -->
                      <div class="tabpanel tab-pane " id="servicio">Servicios</div>
                      <!-- Equipo Tab panes -->
                      <div class="tabpanel tab-pane " id="equipo">Equipo de trabajo</div>
                      <!-- Experiencia Tab panes -->
                      <div class="tabpanel tab-pane " id="experiencia">Experiencia</div>
                      <!-- Portafolio Tab panes -->
                      <div class="tabpanel tab-pane " id="portafolio">Portafolio</div>
                      <!-- Comentario Tab panes -->
                      <div class="tabpanel tab-pane " id="comentario">Comentario</div>
                    </div>
                    <!-- Fin Tab panes -->
                  </div>
            </div>
        </div>
</div>


