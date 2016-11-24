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
      <a href="<?= base_url() ?>c_imagenes/nueva" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Subir Gráfico</a>
    </div>
    <hr>
  </div>
  <div class="row">
    <div class="col-md-12">
      
      <table class="table table-hover">
        <tr>
          <td><b>No. Imagen</b></td>
          <td><b>Nombre</b></td>
          <td><b>Tipo de imagen</b></td>
          <td><b>Ver</b></td>
          <td><b>Eliminar</b></td>
        </tr>
        <?php //Inicio de Foreach para listar los gráficos
          $cont = 1;
          foreach ($disponibleImagenes->result() as $fila) { //Convertimos la consulta de base de datos en una fila
        ?> 
          <tr>
          <td><?= $cont++ ?></td>
          <td><?= $fila->nom_img ?></td>  <!-- Accedemos al nombre -->
          <td><?= $fila->nom_tipo ?></td>
          <td>
            <div class="col-lg-2 ">
              <a class="" href="javascript:void(0)" onclick="mostrarImagen('<?= $fila->id_img ?>')">
                <span class="glyphicon glyphicon-new-window" hidden="true"></span>
              </a>
            </div>
          <td>
            <div class="col-lg-2 ">
              <a class="" href="javascript:void(0)" onclick="eliminarImagen('<?= $fila->id_img ?>')">
                <span class="glyphicon glyphicon-remove" hidden="true"></span>
              </a>
            </div>
          </td>
        </tr>
        <?php   
          } //Fin de Foreach para lista los portafolios
        ?>
      </table>
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php echo $paginationImagen;?>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <hr>
</div>


<script type="text/javascript">
  function eliminarImagen(id)
  {
    $('#form')[0].reset();
    $("#eliminar").attr("href", "<?= base_url()?>c_imagenes/eliminarImagen/"+id);
    $('#modal_imagen').modal('show');
  }
  function mostrarImagen(id)
  {
    $('#form')[0].reset();
    $.ajax({
      url : "<?= base_url('c_imagenes/detallesImagenAjax') ?>" + "/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="nombre"]').text(data.nom_img);
        $("#ver").attr('src', "<?= base_url()?>" + data.url_img);
        $("#ver").attr('alt', data.nom_img);
        $("#ver").attr('title', data.nom_img);
        $('#modal_mostrar').modal('show');
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
         alert('Error get data from ajax');
      }
    });
  }
</script>

<!-- Modal concepto -->
<div class="modal fade" id="modal_imagen" role="dialog">
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
                ¿Seguro que desea eliminar la imagen?
              </strong>
            </p>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a id="eliminar" href="<?= base_url()?>c_imagenes/eliminarImagen/<?= $fila->id_img ?>" class="btn btn-danger">Eliminar</a>
          </div>
      </div>
    </div>
</div>

<!-- Modal concepto -->
<div class="modal fade" id="modal_mostrar" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="#" id="form" class="form-horizontal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span name="nombre"></span></h4>
          </div>
          <div class="modal-body form">
          <br>
             <div id="ma" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img-rounded img-thumbnail">
              <img id="ver" class="img-responsive img-hover" src="" alt="" title="">
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>