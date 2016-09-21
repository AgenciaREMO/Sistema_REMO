

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <!-- Inicio Tabs -->
        <!-- Navegación tabs -->
      <ul class="nav nav-pills" >
        <li id="por" role="presentation"><a href="<?= base_url('portafolios/c_portada/cargarPortada').'/'.$id_portafolio ?>" >Portada</a></li>
        <li id="ser" role="presentation"><a href="<?= base_url('portafolios/c_servicio/cargarServicio').'/'.$id_portafolio ?>">Servicios</a></li>
        <li id="equ" role="presentation"><a href="<?= base_url('portafolios/c_equipo/cargarEquipo').'/'.$id_portafolio?>">Equipo de trabajo</a></li>
        <li id="exp" role="presentation"><a href="<?= base_url('portafolios/c_experiencia/cargarExperiencia').'/'.$id_portafolio?>">Experiencia</a></li>
        <li id="con" role="presentation"><a href="<?= base_url('portafolios/c_contenido/cargarContenido').'/'.$id_portafolio ?>">Contenido Gráfico</a></li>
<!--    <li role="presentation"><a href="<?= base_url('portafolios/c_comentario/cargarComentario').'/'.$id_portafolio ?>">Comentario</a></li>-->      </ul>
    </div>  
  </div>         

<script type="text/javascript">
//Modificar clases de los id
  $(document).ready(function(){
    $("#por").click(function(){
        $(this).addClass('active');
    });
    $("#ser").click(function(){
        $(this).addClass('active');
    });
    $("#equ").click(function(){
        $(this).addClass('active');
    });
    $("#exp").click(function(){
        $(this).addClass('active');
    });
    $("#con").click(function(){
        $(this).addClass('active');
    });
  });
</script>