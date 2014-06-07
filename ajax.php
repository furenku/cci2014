<?php

require('calendario.php');

if(isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch($action) {
    
    case 'seleccionar_anho' :
      if(isset($_POST['anho']) && !empty($_POST['anho'])) {
        seleccionar_anho( $_POST['anho'] );
        
    }
      break;

    case 'seleccionar_mes' :
      if( isset($_POST['anho']) && !empty($_POST['anho'])
         && isset($_POST['mes']) && !empty($_POST['mes'])
         ) {
        seleccionar_mes( $_POST['anho'], $_POST['mes'] );
        
    }
      break;
    
  }
}
?>