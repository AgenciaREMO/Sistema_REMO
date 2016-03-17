<?php
/*
//Documento: Vista de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
 <!-- Contenido de la página -->
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?= base_url()?>c_imagenes/mostrar">Contenido Gráfico</a></li>
          <li><a href="active">Subir imagen</a></li>
        </ol>
      </div>
    </div>
    <form action="<?= base_url()?>c_imagenes/insertar" method="POST">
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="nomPortafolio">Nombre de la imagen *</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Logotipo de REMO">
          </div>
        </div>
        <div class="col-lg-12">

          <br>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
              <label for="file">Selecciona imagen de portada *</label>
              <input type="file" id="img" name="imagen">
          </div>
        </div>
        <div class="col-lg-12">
          <select class="form-control" name="tipos">
            <option value="">Selecciona tipo de imagen</option>
              <?php //Inicio de Foreach para listar los portafolios
                foreach ($consulta1->result() as $fila) { //Convertimos la consulta de base de datos en una fila
              ?>
            <option  value="<?= $fila->id_tipo_img ?>"><?= $fila->nom_tipo?></option>
              <?php   
              } //Fin de Foreach para lista los portafolios
              ?>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
          <a href="<?= base_url()?>c_imagenes/mostrar" type="submit" class="btn btn-default">Cancelar</a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4" >
          <input type="submit" class="btn btn-default" name="siguiente" value="Siguiente">
        </div>
      </div>
   </form>
</div>
