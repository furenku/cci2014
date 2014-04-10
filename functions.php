<?php

require("calendario.php");
require("fakedata.php");


function cabecera() {

  // crater
  /*#cabecera.row>#titulo_sitio.large-3.columns>h2{Cooperativa Cráter Invertido}^#descripcion_desktop.large-4.columns>h1{Texto descripcion}^#imagen_cabecera.img.large-5.columns>img(src="")) */

?>

<div id="cabecera" class="row">

  <!-- titulo y menu -->

  <div id="tituloMenu" class="large-3 columns">
    <div id="titulo_sitio"><h2>Cooperativa Cráter Invertido</h2></div>


    <div id="menu">
      <ul>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
        <li class="opcionMenu"><h5><a href="#">Opción Menú</h5></a></li>
      </ul>
    </div>
    
  </div>

  
  <!-- texto desc -->
  <div id="descripcion_desktop" class="large-4 columns"><h3>21 de diciembre de 1994 registró una explosión que produjo gas y cenizas que ...</h3></div>

  <!-- img principal -->
  <div id="imagen_cabecera" class="img large-5 columns"><img src="" alt=""/></div>

</div>

<?php 

}

function entradas() {



?>

<div id="entradas" class="row">

  <?php
  $numEntradas=15;
  for($i = 0; $i < $numEntradas; $i++) {

  ?>
  <!-- .entradaInicio.large-3.columns>.titulo>h3{Título de entrada}^.extracto{<?php echo lorem(20); ?>} -->

  <div class="entrada large-3 columns">
    <div class="titulo"><h3>Título de entrada</h3></div>
     <div class="extracto"><?php echo lorem(rand(50,100)); ?></div>
 </div>
  

  <?php 
    
  }
  
  
  ?>

</div>


<?php


  
  
}

?>

