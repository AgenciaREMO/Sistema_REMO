<?php
/*
//Documento: Vista Sección Contenido
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
          <!-- Panel del Tab Portafolio -->
          
            <div class="tabpanel tab-pane " id="portafolio">Portafolio
              <div class="panel-body">
                <form action"#" method="#" name="form_portafolio">
                <div class="row">
                  <div class="col-md-12 col-sm-6">
                    <h5>Elige las imagénes que deseas incluir portafolio</h5>
                    </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                    <img class="img-responsive img-hover img-thumbnail" src="img/portafolio/chiquero'z.jpg" alt="Experiencia" title="Experiencia">
                  </div>
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <img class="img-responsive img-hover img-thumbnail" src="img/portafolio/cuatrdos.jpg" alt="Experiencia" title="Experiencia">
                  </div>
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <img class="img-responsive img-hover img-thumbnail" src="img/portafolio/interna.jpg" alt="Experiencia" title="Experiencia">
                  </div>
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <img class="img-responsive img-hover img-thumbnail" src="img/portafolio/mariscos_chava.jpg" alt="Experiencia" title="Experiencia">
                  </div> 
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <img class="img-responsive img-hover img-thumbnail" src="img/portafolio/dulzura_queretana.jpg" alt="Experiencia" title="Experiencia">
                  </div>
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <img class="img-responsive img-hover img-thumbnail" src="img/portafolio/muebles_munoz.jpg" alt="Experiencia" title="Experiencia">
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-lg-2">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalPortafolio">Agregar slider</button>
                  </div>
                  <br />
                  <div class="modal fade" id="myModalPortafolio" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Agregar imagen de portafolio</h4>
                        </div>
                        <div class="modal-body">
                          <form action="php/subirPortafolio.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="file">Selecciona imagen</label>
                              <input type="file" id="img" name="imagen">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <form action="php/subirPortafolio.php" method="POST" enctype="multipart/form-data">
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
          
            <!-- Fin Panel de tab Portadolio --> 
          