<?php
/*
//Documento: Vista de listado portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 03 de Marzo del 2016
//Fecha de modificación: 
*/
?>

 <!-- Contenido de la página -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Portafolios</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12"><p>Edita las secciones de ser necesario para la creación de portafolio.</p><br></div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <a href="<?= base_url() ?>portafolios/c_portafolios/nuevo" class="btn btn-default">Crear portafolio</a>
    </div>
    <hr>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <tr>
          <td><b>No. Portafolio</b></td>
          <td><b>Nombre</b></td>
          <td><b>Ver</b></td>
          <td><b>Enviar</b></td>
          <td><b>Eliminar</b></td>
        </tr>
        <?php //Inicio de Foreach para listar los portafolios
          foreach ($consulta1->result() as $fila) { //Convertimos la consulta de base de datos en una fila
        ?> 
          <tr>
          <td><?= $fila->id_portafolio ?></td> <!-- Accedemos al id_portafolio -->
          <td><?= $fila->nombre ?></td>  <!-- Accedemos al nombre -->
          <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-search" hidden="true" ></span></a></div></td>
          <!--<td><div class="col-lg-2 "><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalEnviar">Enviar</button></div></td>-->
          <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#enviar"></span></a></div></td>
          <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#eliminar"></span></a></div></td>
        </tr>
        <?php   
          } //Fin de Foreach para lista los portafolios
        ?>
      </table>
          <!-- Inicio de Modal de enviar portafolio
          <div id= "enviar" class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="#" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Correo Electrónico</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="sel1">Selecciona el cliente:</label>
                      <select class="form-control">
                        <option></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="email">Correo Electrónico:</label>
                      <br>
                      <input type="email" id="email" name="email" placeholder="  example@hotmail.com">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" name="subir" value="Guardar">
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          Fin de Modal de enviar portafolio -->
    </div>
  </div>
  <hr>
  <hr>
</div>