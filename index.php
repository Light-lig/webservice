<?php
    //Incluyendo al controlador
    include_once("controlador.php");
    
    //Instanciando a la clase ApiFrutas
    $api = new ApiSitios();
  
    //Mostrar registros en pantalla
    $api->getSitios();

?>