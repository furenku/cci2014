<?php

require( 'calendario.php' );

estructuraCalendario();

function ajax_test( $data ){

  echo( json_encode( $data ) );
  
}


?>