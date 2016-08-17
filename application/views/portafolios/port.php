<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <!-- Inicio Tabs -->
        <!-- Navegación tabs -->
      <ul class="nav nav-pills" >
          <li role="presentation"><a href="<?= base_url('portafolios/c_portada/cargarPortada').'/'.$id_portafolio ?>" >Portada</a></li>
          <li role="presentation"><a href="<?= base_url('portafolios/c_servicio/cargarServicio').'/'.$id_portafolio ?>">Servicios</a></li>
          <li role="presentation"><a href="<?= base_url('portafolios/c_equipo/cargarEquipo').'/'.$id_portafolio.'#form1' ?>" id="btn1">Equipo de trabajo</a></li>
          <li role="presentation"><a href="<?= base_url('portafolios/c_experiencia/cargarExperiencia').'/'.$id_portafolio?>">Experiencia</a></li>
          <li role="presentation"><a href="<?= base_url('portafolios/c_contenido/cargarContenido').'/'.$id_portafolio ?>">Portafolio</a></li>
<!--          <li role="presentation"><a href="<?= base_url('portafolios/c_comentario/cargarComentario').'/'.$id_portafolio ?>">Comentario</a></li>-->      </ul>
    </div>  
  </div>         

<script type="text/javascript">
  $(document).ready(function(){
    $("#btn1").click(function(){
        $("#form1").show();
        $("#form2").hidden();
    });
  });
</script>