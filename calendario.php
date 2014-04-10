<?php

function generarCalendario() {
  
  $anhosNums = array( 2011,2012,2013,2014 );
  $anhos = array();

  foreach( $anhosNums as $anhoNum ) {


    $mesesAnho = array();
    $datosMeses = array("Enero"=>31, "Febrero" => 28, "Marzo" => 31, "Abril" => 30, "Mayo" => 31, "Junio" => 30, "Julio" => 31, "Agosto" => 31, "Septiembre" => 30, "Octubre" => 31, "Noviembre" => 30, "Diciembre" => 31 );

    foreach( $datosMeses as $nombreMes => $numDiasMes ) {

      $diasMes  = array();
      for($i = 0; $i < $numDiasMes; $i++ ) {
        
        $eventosDia = array();

        $hayEventos = rand(0,3);

        if( $hayEventos == 1 ) {
          $numEventos = rand(0,3);
          for($j = 0; $j < $numEventos; $j++ ) {
            $evento = "Evento !!";
            array_push( $eventosDia , $evento );
          }

        }

        $dia = array("num"=>($i+1),"eventos"=>$eventosDia);

        array_push( $diasMes , $dia );
      }

      $mes =  array("nombre"=>$nombreMes, "dias"=>$diasMes );
      array_push( $mesesAnho,$mes );
    }

    array_push( $anhos, array("numero"=>$anhoNum, "meses" => $mesesAnho ) );


  }

  return $anhos;

}



function menu() {}


function mostrarCalendario() {
?>

<div id="calendario" class="row">
  <div class="large-12 columns">  

    <?php
    $cal = generarCalendario();
    
    $anho = $cal[ count($cal)-1 ];

    $numAnho = $anho["numero"];
    
    // foreach ....
    $i = 0;
    
    $meses = $anho["meses"];

    $mes = $meses[ $i ] ;

    $dias = $mes["dias"];


    // crear html meses

    
    // crear html dias

   
    $numDias = count($dias);
    foreach( $dias as $dia ) {
    ?>

    <li class="diaCalHorizontal">
      <div class="numero"><?php echo $dia["num"]; ?></div>
      <div class="evento">
        <?php
        $eventos = $dia["eventos"];

        if( count( $eventos ) > 0 ) {

        ?>

        <div class="eventos">
          <?php
          foreach ( $eventos as $evento ) {
          ?>          
          <!-- <li class="eventoDia"><?php echo $evento; ?></li> -->
          <?php
          }
          ?>
        </div>
        <?php 
        }
        ?>
        
        
      </div>
    </li>
    
    <?php

    }


    $echo = '<div id="fechaPrincipal">';

    $echo .= "9 de ";
    // nombre del mes ( menú desplegable )

    $echo .= '<a href="#" data-dropdown="dropMeses" class="botonFecha dropdown">'.$mes['nombre'].'</a>';
    $echo .= '<ul id="dropMeses" data-dropdown-content class="f-dropdown">';

    $drop = "";

    foreach( $meses as $mesArr ) {
      $drop .= '<li><a href="#">'.$mesArr["nombre"].'</a></li>';
    } 
    
    $echo  .= $drop . '</ul>';
    
    
    // nombre del año ( menú desplegable )

    
    $echo .=  '<a href="#" data-dropdown="dropAnhos" class="botonFecha dropdown">'.$anho['numero'].'</a>';
    $echo .='<ul id="dropAnhos" data-dropdown-content class="f-dropdown">';

    $drop = "";

    foreach( $cal as $anho ) {
      $drop .= '<li><a href="#">'.$anho["numero"].'</a></li>';
    } 
    
    $echo  .= $drop . '</ul>';


    $echo .= "</div>";

    echo $echo;



    ?>
  </div>
</div>

<?php 

}

?>