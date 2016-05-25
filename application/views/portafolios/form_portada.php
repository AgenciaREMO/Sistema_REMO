<?php
/*
//Documento: Vista de creación de nuevo portafolio gráfico personalizado
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 07 de Marzo del 2016
//Fecha de modificación: 25 de Mayyo del 2016
*/
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <!-- Inicio Tabs -->
      <div role="tabpanel">
        <!-- Navegación tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="#portada" aria-controls="portada" data-toggle="tab" role="tab" >Portada</a></li>
          <li role="presentation"><a href="#servicio" aria-controls="servicio" data-toggle="tab" role="tab">Servicios</a></li>
          <li role="presentation"><a href="#equipo" aria-controls="equipo" data-toggle="tab" >Equipo de trabajo</a></li>
          <li role="presentation"><a href="#experiencia" aria-controls="experiencia" data-toggle="tab" role="tab">Experiencia</a></li>
          <li role="presentation"><a href="#portafolio" aria-controls="portafolio" data-toggle="tab" role="tab">Portafolio</a></li>
          <li role="presentation"><a href="#tab_comentario" aria-controls="tab_comentario" data-toggle="tab" role="tab">Comentario</a></li>
        </ul>
        <!-- Paneles de Tabs -->
        <div class="tab-content">
          <!-- Panel de Tab Portada -->
            <div class="tabpanel tab-pane active" id="portada">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="page-header">Portada Portafolio</h2>
                  </div>
                </div>
                <?=@$error?>
                <?php validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
                <?= form_open('portafolios/c_portada/insertarPortada'.'/'.$id_portafolio);?>
                
                <?php 
                  
                  foreach ($disponible->result() as $fila)
                  { 

                    if($id_img_checked == $fila->id_img){
                      $radioImg = array(
                      'name'     => 'id_img',
                      'id'       => 'id_img',
                      'value'    => ''.$fila->id_img.'',
                      'checked'  => FALSE,
                      'type'     => 'radio',
                      'disabled' => 'disabled',
                      'checked'  => TRUE
                      );
                    }else{
                      if($id_img_checked_default == $fila->id_img){}
                      $radioImg = array(
                      'name'     => 'id_img',
                      'id'       => 'id_img',
                      'value'    => ''.$fila->id_img.'',
                      'checked'  => FALSE,
                      'type'     => 'radio',
                      'disabled' => 'disabled',
                      'checked'  => TRUE

                      //Si quito el if funciona que checked la que esta relacionada con el id de portafolio
                      //Luego quiero checked por default una pero no sale
                      );
                    }
                    //input
                    form_error('id_img');
                    /*$radioImg = array(
                      'name'     => 'id_img',
                      'id'       => 'id_img',
                      'value'    => ''.$fila->id_img.'',
                      'checked'  => FALSE,
                      'type'     => 'radio',
                      'disabled' => 'disabled',
                      'checked'  => (set_radio('id_img') === $fila->id_img ? TRUE : FALSE)
                    );*/
                    //botones
                    $editar = array(
                      'onClick' => 'activarPor()',
                      'style'   => 'display:inline',
                      'class'   => 'btn btn-primary',
                      'id'      => 'p-editar',
                      'content' => 'Editar'
                    );
                    $cancelar = array(
                      'onClick' => 'desactivarPor()',
                      'style'   => 'display:none',
                      'class'   => 'btn btn-default',
                      'id'      => 'p-cancelar',
                      'content' => 'Cancelar'
                    );
                    $guardar = array(
                      'style' => 'display:none',
                      'class' => 'btn btn-primary',
                      'id'    => 'p-guardar',
                      'value' => 'Guardar'
                    );
                ?>
                  <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-rounded">
                      <?= form_radio($radioImg);?> 
                      <img class="img-responsive img-hover img-thumbnail" src="<?= base_url($fila->url_img)?>" alt="<?= $fila->nom_img ?>" title="<?= $fila->nom_img ?>">
                    </div>
                  </div>
                <?php
                  }
                ?>            
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <?php echo $pagination;?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-1 col-lg-offset-10 ">
                      <?= form_button($editar) ?>
                    </div>
                    <div class="col-lg-3 col-lg-offset-9 ">
                      <?= form_button($cancelar) ?>
                      <?= form_submit($guardar) ?>
                    </div>
                  </div>
                <?= form_close() ?>
                </div>
              </div>           