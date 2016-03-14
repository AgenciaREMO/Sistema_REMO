<?php
/*
//Documento: Vista Sección Equipo de trabajo
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>

<!-- Panel del Tab Equipo -->
          
            <div class="tabpanel tab-pane " id="equipo">Equipo de trabajo
              <div class="panel-body">
                <form action"#" method="#" name="form_equipo">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover">
                      <tr>
                        <td>Colaborador</td>
                        <td>Puesto</td>
                        <td>Resaltar</td>
                        <td>Seleccionar</td>
                      </tr>
                      <tr>
                        <td>Carlos Reyes</td>
                        <td>Director de Estrategias o Innovación</td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                      </tr>
                      <tr>
                        <td>Rozendo Mondragón</td>
                        <td>Coordinador de Desarrollo Web</td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                      </tr>
                      <tr>
                        <td>Xóchitl Ramírez</td>
                        <td>Coordinadora de Diseño y Empaque</td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" ></div></td>
                      </tr>
                      <tr>
                        <td>Gabriel Mccormic</td>
                        <td>Coordinador Multimedia</td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                        <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" ></div></td>
                      </tr>
                    </table>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-2 ">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalPersonal">Seleecionar slider</button>
                </div>
                <div id= "modalPersonal" class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Slider de Equipo de trabajo</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <h4>   Selecciona la imagen de equipo de trabajo</h4>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-2">
                          <img class="img-responsive" src="img/personal/1.jpg" alt="Equipo" title="Equipo">
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-2">
                          <img class="img-responsive" src="img/personal/2.jpg" alt="Equipo" title="Equipo">
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-2">
                          <img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=66&txt=150×130&w=100&h=100" alt="Equipo" title="Equipo">
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-2">
                          <img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=66&txt=150×130&w=100&h=100" alt="Equipo" title="Equipo">
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-2">
                          <img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=66&txt=150×130&w=100&h=100" alt="Equipo" title="Equipo">
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-2">
                          <img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=66&txt=150×130&w=100&h=100" alt="Equipo" title="Equipo">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalPersonal2">Agregar slider</button>
                </div><br />
                <div class="modal fade" id="modalPersonal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Slider de Equipo de trabajo</h4>
                      </div>
                      <div class="modal-body">
                        <form action="php/subirPersonal.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="file">Selecciona slider</label>
                            <input type="file" id="img" name="imagen">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <form action="php/subirPersonal.php" method="POST" enctype="multipart/form-data">
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
          
              <!-- Fin Panel de tab Equipo --> 
             