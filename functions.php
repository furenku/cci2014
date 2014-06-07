<?php

require("calendario.php");
require("fakedata.php");


function cabecera() {

  // crater
  /*#cabecera.row>#titulo_sitio.large-3.columns>h2{Cooperativa Cráter Invertido}^#descripcion_desktop.large-4.columns>h1{Texto descripcion}^#imagen_cabecera.img.large-5.columns>img(src="")) */

?>
<div id="ladrillos">
  <img src="img/ladrillos.jpg"/>
</div>
<div id="cabecera" class="row">

  <!-- titulo y menu -->

  <div id="tituloMenu" class="large-7 columns">
    <div id="logoTitulo" class="row">
    <div id="logo" class="large-3 columns"><img src="img/logocci.jpg"/></div>
    <div id="tituloSitio" class="large-9 columns"><h3>Cooperativa Cráter Invertido</h3></div>
    </div>

    <div id="menu">
      <ul>
        <?php
        for($i=0; $i<5; $i++){
        ?>
        <li class="opcionMenu"><h5><a href="#">Menú</h5></a></li>
        <?php
          }
        ?>
      </ul>
    </div>
    
  </div>

  

  <!-- img principal -->
  <div id="imagen_cabecera" class="img large-5 columns"><img src="img/cratercerillos.jpg" alt=""/></div>

</div>


<?php 

}










function introEspacio() {
?>
<div id="introEspacio" class="row">
  <div id="textoIntro" class="large-8 columns">
  <p>Cooperativa Cráter invertido es una fuerza volcánica invertida. Somos muchoas, tanto individuos como colectivos. Hacemos publicaciones, seminarios y convivios. Discutimos, dibujamos y sobre todo, nos organizamos. Tenemos una archivo/biblioteca que puedes consultar , reproducir y acrecentar. Somos una cascada de preguntas que existen en papel gracias a una máquina que imprime, tan rápido como las nubes y que en ocasiones rentamos y otras la colectivizamos. Nos gusta compartir la comida, el tiempo, las emociones, el conocimiento, los sentimientos, los cuerpos y las angustias.</p>              

  <p>Nuestra misión es aritmética. Es sumar. Sumar voces. Multiplicar deseos, fuerzas mutantes y diferencias por compartir; también dividir responsabilidades para exponenciar posibilidades.</p>
  </div>


  
<div id="textoEspacio" class="large-4 columns">

  <p>
    <b>Tenemos nueva cueva!!!!</b>

  </p>
      <p>
Una casa en la colonia San Rafael, ahí imprimimos nuestros libros y revistas, montamos exposiciones, discutimos sobre nuestras posturas, dibujamos monos y monitas y cotorreamos con la banda. Ven está bien elegante. 
        <p>
          <b>
Joaquín García  Icazbalceta 32 B. A espaldas del metro San Cosme.
          </b>
    </p>
</p>

</div>

</div> <!-- row -->
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

  
  <div class="entrada large-<?php echo rand(1,3)*2;  ?> columns">
    <?php if(rand(0,5)<2){ ?>
      <img src="img/tele.png"/>
      <?php } else {  ?>
    <div class="titulo"><h3>Título de entrada</h3></div>
    <div class="extracto"><?php echo lorem(rand(50,100)); ?></div>
    <?php } ?>
  </div>
  

  <?php 
  
  }
  
  
  ?>

</div>


<?php




}




function seminariosEventos() {
?>
<div id="seminariosEventos" class="row">
  <div id="seminarios" class="large-7 columns">
  
<h4>Laboratorios de investigación y experimentación colaborativa:</h4>
</br>
<b>Grupos de trabajo /Seminarios / </b>



<p>De Junio 2014 a Julio 2015 estaremos preparando una serie de encuentros donde pondremos en duda nuestro conocimiento y a partir de nuestras preguntas surgirán más publicaciones, acciones o simplemente más y más dudas.</p>


  <p>Estos laboratorios tienen algo en común, son experimentos para entender bajo que lógicas, perspectivas y estrategias pueden construirse enunciados críticos , investigaciones, lenguajes  y experimentaciones artísticas desde lo colaborativo. Son al mismo tiempo procesos de autoeducación, coproducción y autopublicación.</p>


    <p>A estos encuentros les llamamos “Seminarios del Presente” y son los siguientes:</p>

 
    <ul>
    <li>1994</li>

    <li>Casi nadie</li>

    <li>Revista Cartucho</li>

    <li>Zungale</li>

    <li>Sin imagen aparente</li>

    <li>Escuchalia</li>
</ul>

  </div>

  
  <div id="eventos" class="large-5 columns">
    <h4>Próximos eventos</h4>
    <li>
      <i>La Purga</i>
</br>Juan Pablo Villegas
</br>
12 de Junio

      


      


    </li>
    <li>Presentación de la revista Cartucho #9:
<br><i>¿México?  ¿Me lo repite por favor?</i>
</br>

20 y 21 de Junio  Consulta cartelera en www.revistacartucho.com
    </li>
    <li>Inauguración de la exposición colectiva de Erick Tlaseca y Miguel Daly
</br>
24 de Julio
    </li>

  </div>
</div>
<?php
}
?>
