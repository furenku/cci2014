<?php

function listaEventos() {
  global $tmpEventos;
  global $eventos;
  
  $tmpEventos = array();
  $eventos = array();

  // juanpis:

  $evento = array();
  $evento['ttl'] = 'La Purga. Juan Pablo Villegas';
  $evento['dates'] = array('06/12/2014');

  array_push( $tmpEventos, $evento );


  // cartucho:

  $evento = array();
  $evento['ttl'] = 'Presentación de la revista Cartucho #9: <i> ¿México?  ¿Me lo repite por favor? </i>';
  $evento['ext'] = 'Consulta cartelera en <a href="http://www.revistacartucho.com">http://www.revistacartucho.com</a>';
  $evento['dates'] = array('06/20/2014','06/21/2014');

  array_push( $tmpEventos, $evento );



  // eric y maik:

  $evento = array();
  $evento['ttl'] = 'Exposición de Erick Tlaseca y Miguel Daly';
  $evento['dates'] = array('07/24/2014');

  array_push( $tmpEventos, $evento );

}


function estructuraCalendario() {

  global $tmpEventos;
  global $eventos;

  listaEventos();
  foreach( $tmpEventos as $evento ) {
    
    foreach($evento['dates'] as $date) {
      $year = date('Y', strtotime($date));
      $month = date('m', strtotime($date));
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

      echo "insertar dia<br>";
      array_push( $eventos[$year][$month][$day], "</br>evento el ". $day  );
      
      /* array_push( $dayArr, "evento el ". $day ); */
      
      
      //array_push( $eventos[$year], 
    }

    /*
    array_push( $monthArr, $dayArr );
    array_push( $yearArr, $monthArr );
    $eventos = $yearArr;
    */

}

var_dump( $eventos ) ;

echo '</br></br></br>';
  /*
  $eventos["2014"] = array();

  $anho = $eventos["2014"];

  $anho['06'] = array();
  
  $mes = $anho['06'];

  array_push( $mes, $evento );
  */
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