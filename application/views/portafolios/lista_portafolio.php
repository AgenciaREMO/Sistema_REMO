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
      <h1 class="page-header">Gestor de Portafolios</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12"><p>Edita las secciones de ser necesario para la creación de portafolio.</p><br></div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <a href="<?= base_url() ?>portafolios/c_portafolios/nuevoPortafolio" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear portafolio</a>
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
          $cont = 1;
          foreach ($consulta1->result() as $fila) { //Convertimos la consulta de base de datos en una fila
        ?> 
          <tr>
            <td><?= $cont++ ?></td>
            <td><?= $fila->nombre ?></td>  <!-- Accedemos al nombre -->
            <td><div class="col-lg-2 "><a href="#" ><span class="glyphicon glyphicon-new-window" hidden="true" ></span></a></div></td>
            <!--<td><div class="col-lg-2 "><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalEnviar">Enviar</button></div></td>-->
            <td><div class="col-lg-2 "><a href="#" ><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#enviar"></span></a></div></td>
            <td>
              <div class="col-lg-2 ">
                <a class="" href="javascript:void(0)" onclick="eliminarPortafolio('<?= $fila->id_portafolio ?>')"><span class="glyphicon glyphicon-remove" hidden="true"></span></a>
              </div>
            </td>
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

<script type="text/javascript">
  function eliminarPortafolio(id)
  {
    $('#form')[0].reset();
    $("#eliminar").attr("href", "<?= base_url()?>portafolios/c_portafolios/eliminarPortafolio/"+id);
    $('#modal_portafolio').modal('show');
  }
</script>

<!-- Modal concepto -->
<div class="modal fade" id="modal_portafolio" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmación</h4>
          </div>
          <div class="modal-body form text-center">
          <form action="#" id="form" class="form-horizontal">
            <p class="">
              <strong>
                ¿Seguro que desea eliminar el portafolio?
              </strong>
            </p>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a id="eliminar" href="<?= base_url()?>portafolios/c_portafolios/eliminarPortafolio/<?= $fila->id_portafolio ?>" class="btn btn-danger">Eliminar</a>
          </div>
      </div>
    </div>
</div>