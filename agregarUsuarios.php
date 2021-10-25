<?php
    //INcluir el controlador
    include_once("controladorUsuario.php");

    //Instanciar la clase Apiusuarios
    $apiuser = new ApiUsuarios();

    //Recibiendo elementos desde Android
    if($_REQUEST){
        //Declarar variables locales
        $txtNombre  = $_REQUEST['txtNombre'];
        $txtUsuario = $_REQUEST['txtUsuario'];
        $txtClave   = (isset($_REQUEST['txtClave'])? $_REQUEST['txtClave']:"");
    
        $apiuser->addUsuarios($txtNombre,$txtUsuario,$txtClave);
    }

?>