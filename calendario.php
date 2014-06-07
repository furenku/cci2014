<?php

require('lista_eventos.php');


global $datosMeses;

$datosMeses = array("Enero"=>31, "Febrero" => 28, "Marzo" => 31, "Abril" => 30, "Mayo" => 31, "Junio" => 30, "Julio" => 31, "Agosto" => 31, "Septiembre" => 30, "Octubre" => 31, "Noviembre" => 30, "Diciembre" => 31 );


function generarDropdown( $type, $value, $arr ) {
  global $eventos;
  if($type == "anho"){
    $id = "anhos";
  }
  if($type == "mes"){
    $id = "meses";
  }

  $echo =  '<a href="#" data-dropdown="'.$id.'_dropdown" class="botonFecha dropdown">';
  $echo .='<span class="dropdown-text">'.$value.'</span>';
  $echo .= '<span class="fa fa-angle-down"></span>';
  $echo .= '</a>';

  $echo .='<ul id="'.$id.'_dropdown" data-dropdown-content class="f-dropdown">';

  foreach( $arr as $key ) {
    $echo .= '<li><a href="#">'.$key.'</a></li>';
  }
  
  $echo  .= '</ul>';

  return $echo;

}


function calendarioHTML() {

  global $datosMeses;
  global $eventos;
  
  $monthDropdowns = array();
  
  $showYear = date('Y');
  $showMonth = date('m');
  $showDay = date('d');

  $dd = generarDropdown( 'anho', $showYear, array_keys($eventos) );

  $dropdowns = '<div id="dropdownAnhos">'.$dd.'</div>';
  
  $nombreMes = array_keys( $datosMeses )[ (int) $showMonth - 1 ];
  $numsMeses = $eventos[$showYear];
  $nombresMeses = array_keys( $datosMeses );
  $nombresMesesExistentes = array();
  
  foreach( $numsMeses as $num => $mes ) {
    $nombresMesesExistentes[] = $nombresMeses[ (int) $num - 1 ];
  }

  
  $dd = generarDropdown( 'mes', $nombreMes, $nombresMesesExistentes );

  $dropdowns .= '<div id="dropdownMeses">'.$dd.'</div>';
  
  

  $echo = '<div id="calendario" class="row">';
  $echo .= '<div id="dropdownsFechas" class="large-2 columns">'.$dropdowns.'</div>';
  $echo .= '<div id="diasMes" class="large-10 columns">&nbsp</div>';
  $echo .= '</div>';

  echo $echo;
?>

<script type="text/javascript" src="js/calendario.js"></script>

<?php 

}





function estructuraCalendario() {

  global $tmpEventos;
  global $eventos;

  listaEventos();
  foreach( $tmpEventos as $evento ) {
    
    foreach($evento['dates'] as $date) {
      $year = date('Y', strtotime($date));
      $month = date('n', strtotime($date));
      $day = date('d', strtotime($date));

      // existen ya eventos en año?
      if( ! array_key_exists( $year, $eventos ) ) {
        $eventos[$year] = array();
        
      } 
      $yearArr = $eventos[$year];
      
      
      // existen ya eventos en mes?
      if( ! array_key_exists( $month, $eventos[$year] ) ) {
        $eventos[$year][$month] = array(); 
        /* $yearArr[$month] = array(); */
      }
      /* $monthArr = $yearArr[$month]; */
      
      // existen ya eventos en dia?
      if( ! array_key_exists( $day, $eventos[$year][$month] ) ) {
        //if( ! array_key_exists( $day, $monthArr ) ) {
        /* $monthArr[$day] = array(); */
        /* $yearArr[$month][$day] = array(); */
        $eventos[$year][$month][$day] = array();
      } 
      /* $dayArr = $monthArr[$day]; */

      
      array_push( $eventos[$year][$month][$day], $evento );
      
      /* array_push( $dayArr, "evento el ". $day ); */
      
      
      //array_push( $eventos[$year], 
    }


  }


}


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

  $cal = generarCalendario();
  
  $anho = $cal[ count($cal)-1 ];

  $numAnho = $anho["numero"];
  
  // foreach ....
  
  $meses = $anho["meses"];

  $i = 0;

  $mes = $meses[ $i ] ;

  $dias = $mes["dias"];


  
?>

<div id="calendario" class="row">


  <div id="selector_fecha" class="large-1 medium-1 columns">

    <?php
    $meses = $anho["meses"];

    $echo = '<a href="#" data-dropdown="dropMeses" class="botonFecha dropdown">'.$mes['nombre'].'</a>';
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



    echo $echo;
    ?>
  </div> <!-- selector_fecha -->
  <div class="large-11 columns">  

    <?php



    // crear html meses

    
    // crear html dias

    
    $numDias = count($dias);
    foreach( $dias as $dia ) {
    ?>

    <li class="diaCalHorizontal">
      <div class="numero"><?php echo $dia["num"]; ?></div>
      <div class="evento">
        <?php
        $eventos_dia = $dia["eventos"];

        if( count( $eventos_dia ) > 0 ) {

        ?>

        <div class="eventos">
          <?php
          foreach ( $eventos_dia as $evento ) {
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




    ?>
  </div>
</div>

<?php 

}

?>