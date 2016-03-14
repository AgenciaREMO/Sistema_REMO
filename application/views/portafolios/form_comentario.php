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
            <div class="tabpanel tab-pane " id="comentario">
              <div class="panel-body">
                <form id="form_comentario" action"<?= base_url()?>portafolio/guardarComentario" method="POST" name="form_comentario">
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
        
            <!-- Fin Panel de tab Comentario --> 
         