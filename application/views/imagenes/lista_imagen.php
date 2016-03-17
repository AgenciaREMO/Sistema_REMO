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
      <h1 class="page-header">Contenido Gráfico</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <a href="<?= base_url() ?>c_imagenes/nueva" class="btn btn-default">Subir imagen</a>
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
          <td><b>Eliminar</b></td>
        </tr>
        <?php //Inicio de Foreach para listar los portafolios
          foreach ($consulta1->result() as $fila) { //Convertimos la consulta de base de datos en una fila
        ?> 
          <tr>
          <td><?= $fila->id_img ?></td> <!-- Accedemos al id_portafolio -->
          <td><?= $fila->nom_img  ?></td>  <!-- Accedemos al nombre -->
          <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-search" hidden="true" ></span></a></div></td>
          <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-trash" hidden="true"></span></a></div></td>
        </tr>
        <?php   
          } //Fin de Foreach para lista los portafolios
        ?>
      </table>

    </div>
  </div>
  <hr>
  <hr>
</div>