<div class="container">
  <div id="form1">
	<form action"#" method="#" name="form_equipo">
        <div class="row">
            <div class="col-md-12">
                <?php //form_open('portafolios/c_equipo/validarEquipo'.'/'.$id_portafolio);?>
                    <table class="table table-hover">
                        <tr>
                          <td><b>No.</b></td>
                          <td><b>Colaborador</b></td>
                          <td><b>Puesto</b></td>
                          <td><b>Resaltar</b></td>
                          <td><b>Seleccionar</b></td>
                        </tr>
                        <?php 
                        	//botones
		                    $editar = array(
		                      'onClick' => 'activarEqu()',
		                      'style'   => 'display:inline',
		                      'class'   => 'btn btn-primary',
		                      'id'      => 'eq-editar',
		                      'content' => 'Editar'
		                    );
		                    $cancelar = array(
		                      'onClick' => 'desactivarEqu()',
		                      'style'   => 'display:none',
		                      'class'   => 'btn btn-default',
		                      'id'      => 'eq-cancelar',
		                      'content' => 'Cancelar'
		                    );
		                    $guardar = array(
		                      'style' => 'display:none',
		                      'class' => 'btn btn-primary',
		                      'id'    => 'eq-guardar',
		                      'value' => 'Guardar'
		                    );
		                    $cargar = array(
		                      'style' => 'display:inline',
		                      'class' => 'btn btn-primary',
		                      'id'    => 'eq-nueva-s',
		                      'content' => 'Nueva portada',
		                      'data-toggle' => 'modal',
		                      'data-target' => '#cargarPortada'
		                      );
		                    $cargar2 = array(
		                      'style' => 'display:none',
		                      'class' => 'btn btn-primary',
		                      'id'    => 'eq-nueva-n',
		                      'content' => 'Nueva portada',
		                      'data-toggle' => 'modal',
		                      'data-target' => '#cargarPortada'
		                      );
                            $cont = 1;
                            foreach ($dataEquipo->result() as $fila) { //Convertimos la consulta de base de datos en una fila
                        ?>
                          <tr>
                            <td><?= $cont++ ?></td>
                            <td><?= $fila->nombre ?></td> 
                            <td><?= $fila->puesto ?></td>
                            <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                            <td><div class="checkbox" style="text-align:center"><input type="checkbox" value="" checked></div></td>
                          </tr>
                        <?php   
                          } //Fin de Foreach para lista los portafolios
                        ?>
                      </table>
                    <?php //form_close(); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-lg-offset-9 ">
                <?= form_button($editar) ?>
                <?= form_button($cargar) ?>
            </div>
            <div class="col-lg-4 col-lg-offset-8 ">
                <?= form_button($cancelar) ?>
                <?= form_submit($guardar) ?>
                <?= form_button($cargar2) ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-2 ">
                <button id="btn2" src="<?= base_url('portafolios/c_equipo/cargarEquipo').'/'.$id_portafolio.'#form2' ?>" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalPersonal">Seleecionar slider</button>
           	</div>
            <div id= "modalPersonal" class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      	<div class="modal-header">
                        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        	<h4 class="modal-title" id="myModalLabel">Selección de slider</h4>
                      	</div>
                        <div class="modal-body">
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
            </div>
            <br/>
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
        <a id="btn2" href="<?= base_url('portafolios/c_equipo/cargarEquipo').'/'.$id_portafolio.'#form2' ?>">Equipo de trabajo</a>
    </form>
  </div>
  <div id="form2" style="hidden:true;">
    Este sera el contenido dos paginado
  </div>
</div>


<script type="text/javascript">
 $(document).ready(function(){
    $("#btn2").click(function(){
        $("#form2").toggle();
    });
});

</script>