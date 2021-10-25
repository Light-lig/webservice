<?php
//Incluir el controlador
include_once("controladorUsuario.php");
//Instanciamiento para la clase ApiUsuarios
$apiUser = new ApiUsuarios();

//Recuperando el dato enviado del movil
if($_REQUEST)
    $txtUsuarioId = $_REQUEST['txtUsuarioId'];

//Ejecutar consulta
$apiUser->getUsuario($txtUsuarioId);
?>