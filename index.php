<?php


?>

<!doctype php>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cooperativa Cráter Invertido</title>
    <link rel="stylesheet" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css" />

    <script src="bower_components/modernizr/modernizr.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <?php require("functions.php"); ?>


    
  </head>
  <body>
    

    <?php
    
    
    estructuraCalendario();


    calendarioHTML();
    
    //mostrarCalendario();

    cabecera();

    introEspacio();

    ?>
 
    <div id="mesa" class="row">
      <img src="img/mesa.png"  class="imgbanner large-12 columns" alt=""/>
    </div>

    <?php

    seminariosEventos();
    
    
    entradas();
    
    ?>


    

    <footer>
      <div id="footer" class="row">
        <div class="large-12 columns">
      Cooperativa Cráter Invertido. 2014.
        </div>
      </div>
    </footer>

    
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
    <script src="js/app.js"></script>

    <script type="text/javascript">

     jQuery(document).ready(function($){

       $('#entradas .entrada').niceScroll();
       
     });

     
    </script>


    
  </body>
</html>
