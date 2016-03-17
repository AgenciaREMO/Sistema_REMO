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
                  <form action"#" method="#" name="form_portada">
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
                        <div class="col-sm-12 col-md-6">
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAP">Agregar portada</button>
                        </div>
                        <!-- Inicio Modal seleccionar portada  -->
                        <div class="modal fade" id="modalAP" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Seleccionar portada</h4>
                              </div>
                              <div class="modal-body">
                                <form action="php/subirPortada.php" method="POST" enctype="multipart/form-data">
                                  <div class="col-lg-12">
                                    <select class="form-control" name="id_">
                                      <option value="">Selecciona tipo de imagen</option>
                                      <?php //Inicio de Foreach para listar los portafolios
                                            foreach ($consulta1->result() as $fila) { //Convertimos la consulta de base de datos en una fila
                                          ?>
                                        <option  value="<?= $fila->nombre?>"><?= $fila->nombre?></option>
                                      <?php   
                                            } //Fin de Foreach para lista los portafolios
                                          ?>
                                    </select>
                                    <br>
                                  </div>
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
            
            <!-- Fin Panel de tab Portada -->  
            