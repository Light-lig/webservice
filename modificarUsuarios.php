<?php
//Incluir el controlador
include_once("controladorUsuario.php");

//Instanciamiento para la clase ApiUsuarios
$apiUser = new ApiUsuarios();

//Recuperando el dato enviado del movil
if($_REQUEST){
    $txtUsuarioId = $_REQUEST['txtUsuarioId'];
    $txtNombre    = $_REQUEST['txtNombre'];
    $txtUsuario = $_REQUEST['txtUsuario'];
    $txtClave    = $_REQUEST['txtClave'];

    //Ejecutar consulta
    $apiUser->updateUsuarios(
                    $txtUsuarioId,
                    $txtNombre,
                    $txtUsuario,
                    $txtClave);
}//Fin de modificar usuario
?>