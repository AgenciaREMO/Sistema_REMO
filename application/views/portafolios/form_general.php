<?php
/*
//Documento: Vista de Action General para el portafolio
//Versión: 1.0
//Autor: Ing. María de los Ángeles Godínez Rivas
//Fecha de creación: 14 de Marzo del 2016
//Fecha de modificación: 
*/
?>
 </div>
          <!-- Fin Paneles de Tab -->
       
      </div>
    </div>
  </div>
     <hr>
    <!-- Call to Action Section -->
    <div class="well">
      <div class="row text-center">
          <div class="col-md-2"><div class="col-lg-2 "><a href="#"><img src="img/ver.png"></a></div></div>
            <div class="col-md-2">
              <!-- Se manda el id del portafolio actual para que al momento de cancelar elimine ese registro -->
              <a class="btn btn-sm btn-default" href="<?= base_url('portafolios/c_portafolios/cancelarPortafolio').'/'.$id_portafolio ?>">Cancelar</a> 

            </div>
            <div class="col-md-2"><a class="btn btn-sm btn-default" href="#">Generar portafolio</a></div>
        </div>
    </div>
  </form>
</div>


