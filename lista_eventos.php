<?php

function listaEventos() {
  global $tmpEventos;
  global $eventos;
  
  $tmpEventos = array();
  $eventos = array();

  // juanpis:


  
  $evento = array();
  $evento['ttl'] = 'trecedeoctubre';
  $evento['dates'] = array('10/13/2011');

  array_push( $tmpEventos, $evento );


  $evento = array();
  $evento['ttl'] = 'Pabellón 94';
  $evento['dates'] = array('10/13/2012');

  array_push( $tmpEventos, $evento );

  
  $evento = array();
  $evento['ttl'] = 'La Purga. Juan Pablo Villegas';
  $evento['dates'] = array('06/12/2014');

  array_push( $tmpEventos, $evento );


  $evento = array();
  $evento['ttl'] = 'Nicolás Wills en Taller Olmo';
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

?>