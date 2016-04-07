<?php
/*
//Documento: Vista Sección Comentario
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>

  <!-- Panel del Tab Comentario -->
            <div class="tabpanel tab-pane " id="tab_comentario">
              <div class="panel-body">
                <form action="<?= base_url()?>portafolios/c_portafolios/insertarComentario/<?=$id_portafolio?>" method="POST">
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <h5>Breve comentario</h5>
                    <!--<form class="navbar-form navbar-left" role="">-->
                      <div class="col-md-12 form-group">
                          <input class="form-control" type="text" size="20" name="comentario" id="comentario" value="<?=$comentario?>">           
                      </div>
                    <!--</form>-->
                  </div>
                </div>
                  <div class="col-lg-1 col-lg-offset-11 ">
                    <div class="row">
                      <div class="col-lg-1">
                        <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      </div>
                      <div class="col-lg-1">
                       <!--<input type="submit" class="btn btn-default" name="guardar" value="Guardar">-->
                       <a class="btn btn-sm btn-default" href="<?= base_url('portafolios/c_portafolios/insertarComentario').'/'.$id_portafolio ?>">Guardar</a> 
                      </div>
                    </div>
                  </div>
              </form>
              </div>
            </div>
  <!--Fin Panel de tab Comentario --> 

