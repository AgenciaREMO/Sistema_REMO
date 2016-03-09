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
  <div class="row">
    <div class="col-lg-12">
      <!-- Inicio Tabs -->
      <div role="tabpanel">
        <form>
          <!-- Navegación tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"class="active"><a href="#portada" aria-controls="portada" data-toggle="tab" role="tab" >Portada</a></li>
            <li role="presentation"><a href="#servicio" aria-controls="servicio" data-toggle="tab" role="tab">Servicios</a></li>
            <li role="presentation"><a href="#equipo" aria-controls="equipo" data-toggle="tab" >Equipo de trabajo</a></li>
            <li role="presentation"><a href="#experiencia" aria-controls="experiencia" data-toggle="tab" role="tab">Experiencia</a></li>
            <li role="presentation"><a href="#portafolio" aria-controls="portafolio" data-toggle="tab" role="tab">Portafolio</a></li>
            <li role="presentation"><a href="#comentario" aria-controls="comentario" data-toggle="tab" role="tab">Comentario</a></li>
          </ul>
          <!-- Paneles de Tabs -->
          <div class="tab-content">
            <!-- Panel de Tab Portada -->
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
                      <div class="col-sm-12 col-md-6">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalSP">Seleccionar portada</button>
                      </div>
                      <!-- Inicio Modal seleccionar portada -->  
                      <div class="modal fade" id="modalSP" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Seleccionar portada</h4>
                            </div>
                            <div class="modal-body">
                              <form action="php/subirPortada.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="file">Selecciona imagen de portada</label>
                                  <input type="file" id="img" name="imagen">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                            	<form action="php/subirPortada.php" method="POST" enctype="multipart/form-data">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <input type="submit" class="btn btn-primary" name="subir" value="Guardar">
                              </form>
                            </div>
                          </div>
                        </div> 
                      </div>
                      <!-- Fin Modal seleccionar portada --> 
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
            <!-- Fin Panel de tab Portada -->  
            <!-- Panel del Tab Servicio -->
            <div class="tabpanel tab-pane " id="servicio">Servicios
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-3">
                    <form class="navbar-form navbar-left" role="">
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Diseño Gráfico</label> 
                      </div> <br />
                      <div class="checkbox">
                        <label><input type="checkbox" value=""> Diseño Web</label>
                      </div><br />
                      <div class="checkbox">
                        <label><input type="checkbox" value=""> Diseño 3D</label>
                      </div> <br />
                      <div class="checkbox">
                        <label><input type="checkbox" value=""> Proyectos Multimedia</label>
                      </div><br />
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <h5>Diseño Gráfico</h5>
                    <form class="navbar-form navbar-left" role="">
                      <div class="form-group">
                        <textarea class="form-control" rows="3" cols="140">Tu empresa requiere una personalidad que la distinga de las demás. Desarrollamos la identidad que necesitas para potencializar de forma positiva su presencia a través de materiales visuales digitales e impresos haciendo tu empresa memorable en la mente del consumidor. 
                        </textarea><br /><br />
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h5>Diseño Web</h5>
                    <form class="navbar-form navbar-left" role="">
                      <div class="form-group">
                        <textarea class="form-control" rows="3" cols="140">Internet se ha convertido en la herramienta más accesible para la búsqueda de productos, servicios e intercambio de información. Te ayudamos a crear un espacio de acercamiento con tus clientes y colaboradores bajo un entorno de confianza que propicie una excelente comunicación y facilite la labor de venta. 
                        </textarea disabled ><br /><br />
                      </div>
                    </form>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <h5>Diseño y Desarrollo Web</h5>
                        <form class="navbar-form navbar-left" role="">
                          <div class="form-group">
                            <textarea class="form-control" rows="3" cols="140">Las visualizaciones post producción de materiales de exhibición y productos son una herramienta de venta fundamental porque permiten observar cualquier proyecto antes de ser elaborado. Desarrollamos el concepto y render 3D del objeto que quieres dar a conocer. 
                            </textarea><br /><br />
                          </div>
                        </form>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <h5>Proyectos Multimedia</h5>
                      <form class="navbar-form navbar-left" role="">
                        <div class="form-group">
                          <textarea class="form-control" rows="3" cols="140">Es difícil convencer que tu producto o servicio es la mejor opción cuando dispones de poco tiempo para lograrlo. Una producción profesional de fotos y vídeo puede ser la diferencia para describir tu producto o servicio de manera rápida, clara y sobre todo efectiva para motivar la compra. Nuestros especialistas en multimedia pueden llevar tu marca al nivel de comunicación audiovisual que necesitas. 
                          </textarea><br /><br />
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-offset-11">
                      <a href="#"><img class="img-responsive iconos" src="img/lapiz.png" alt="Editar" title="Editar"></a><br />
                      <a href="#"><img class="img-responsive iconos" src="img/16703.png" alt="Guardar" title="Guardar"></a>
                    </div>    
                  </div>
              </div>
            </div>
            <!-- Fin Panel de tab Servicio --> 
            <!-- Panel del Tab Equipo -->
            <div class="tabpanel tab-pane " id="equipo">Equipo de trabajo
              <div class="panel-body">
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
                <div class="row">
                  <div class="col-md-3 col-sm-offset-11">
                    <a href="#"><img class="img-responsive iconos" src="img/lapiz.png" alt="Editar" title="Editar"></a><br />
                    <a href="#"><img class="img-responsive iconos" src="img/16703.png" alt="Guardar" title="Guardar"></a>
                  </div>    
                </div>
              </div>
              </div>
              <!-- Fin Panel de tab Equipo --> 
              <!-- Panel del Tab Experiencia -->
              <div class="tabpanel tab-pane " id="experiencia">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-6">
                      <h5>Elige las imagénes que deseas incluir  como experiencia</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/cuatrdos.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/dulzuraQueretana.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/incusa.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/sazonConmadre.jpg" alt="Experiencia" title="Experiencia">
                    </div> 
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/sika.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/sika_academy.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/tec100.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/tecno.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/temploSanta.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/tranco.jpg" alt="Experiencia" title="Experiencia">
                    </div> 
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/uaq.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <img class="img-responsive img-hover img-thumbnail" src="img/experiencia/umest.jpg" alt="Experiencia" title="Experiencia">
                    </div>
                  </div>
                  <br />
                  <div class="row">
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
                <div class="row">
                  <div class="col-md-3 col-sm-offset-11">
                    <a href="#"><img class="img-responsive iconos" src="img/lapiz.png" alt="Editar" title="Editar"></a><br />
                    <a href="#"><img class="img-responsive iconos" src="img/16703.png" alt="Guardar" title="Guardar"></a>
                  </div>    
                </div>
              </div>
            </div>
            <!-- Fin Panel de tab Experiencia --> 
            <!-- Panel del Tab Portafolio -->
            <div class="tabpanel tab-pane " id="portafolio">Portafolio
              <div class="panel-body">
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
                <div class="row">
                  <div class="col-md-3 col-sm-offset-11">
                    <a href="#"><img class="img-responsive iconos" src="img/lapiz.png" alt="Editar" title="Editar"></a><br />
                    <a href="#"><img class="img-responsive iconos" src="img/16703.png" alt="Guardar" title="Guardar"></a>
                  </div>    
                </div>
              </div>
            </div>
            <!-- Fin Panel de tab Portadolio --> 
            <!-- Panel del Tab Comentario -->
            <div class="tabpanel tab-pane " id="comentario">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <h5>Breve comentario</h5>
                    <form class="navbar-form navbar-left" role="">
                      <div class="form-group">
                        <textarea class="form-control" rows="3" cols="140"> Trabajamos con pasión cada proyecto, poniendo en manos de nuestros clientes el conocimiento y experiencia de nuestro equipo para lograr el éxito juntos.
                        </textarea><br /><br />
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-offset-11">
                    <a href="#"><img class="img-responsive iconos" src="img/lapiz.png" alt="Editar" title="Editar"></a><br />
                    <a href="#"><img class="img-responsive iconos" src="img/16703.png" alt="Guardar" title="Guardar"></a>
                  </div>    
                </div>
              </div>
            </div>
            <!-- Fin Panel de tab Comentario --> 
          </div>
          <!-- Fin Paneles de Tab -->
        </form>
      </div>
    </div>
  </div>
     <hr>
    <!-- Call to Action Section -->
    <div class="well">
      <div class="row text-center">
          <div class="col-md-2"><div class="col-lg-2 "><a href="#"><img src="img/ver.png"></a></div></div>
            <div class="col-md-2"><a class="btn btn-sm btn-default" href="portafolio.php">Cancelar</a></div>
            <div class="col-md-2"><a class="btn btn-sm btn-default" href="#">Generar portafolio</a></div>
        </div>
    </div>
</div>


