 <!-- Page Content -->
    <div class="container">
    <br>
    <br>
    <div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Portafolios</h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-lg-12"><p>Edita las secciones de ser necesario para la creación de portafolio.</p><br /></div>
    </div>
    <div class="row">
    <div class="col-sm-12 col-md-6">
        	<a href="<?= base_url() ?>portafolios/nuevo" class="btn btn-default">Crear portafolio</a>
    </div>
    <hr>
    </div>
    <div class="row">
            	<div class="col-md-12 col-sm-6">
                	<table class="table table-hover">
                    	<tr>
                        	<td><b>No. Portafolio</b></td>
                            <td><b>Nombre</b></td>
                            <td><b>Ver</b></td>
                            <td><b>Enviar</b></td>
                        </tr>
                        <tr>
                            <td>001</td>
                            <td>Portafolio Diseño Gráfico</td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-search" hidden="true" ></span></a></div></td>
                            <!--<td><div class="col-lg-2 "><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalEnviar">Enviar</button></div></td>-->
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#modalEnviar"></span></a></div></td>
                            <div id= "modalEnviar" class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Correo Electrónico</h4>
                                            </div>
                                            <div class="modal-body">
                                                 <form action="#" method="POST" enctype="multipart/form-data">
                                                 	<div class="form-group">
                                                      <label for="sel1">Select list:</label>
                                                      <select class="form-control">
                                                          <option>Cliente 1</option>
                                                          <option>Cliente 2</option>
                                                          <option>Cliente 3</option>
                                                          <option>Cliente 4</option>
                                                          <option>Cliente 5</option>
                                                       </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Correo:</label>
                                                        <input type="email" id="email" name="email" placeholder="example@hotmail.com">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-primary" name="subir" value="Guardar">
                                                </form>
                                            </div>
                                    </div>
                                </div>
                           </div>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Portafolio Remo</td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-folder-open"></span></a></div></td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#modalEnviar"></span></a></div></td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Portafolio Multimedia</td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-folder-open"></span></a></div></td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#modalEnviar"></span></a></div></td>
                        </tr>
                        <tr>
                            <td>004</td>
                            <td>Portafolio Caso de Éxito 1</td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-folder-open"></span></a></div></td>
                            <td><div class="col-lg-2 "><a href="#"><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#modalEnviar"></span></a></div></td>
                        </tr>
                   </table>
                </div>
            </div>
    <hr>
		
	<hr>

</div>