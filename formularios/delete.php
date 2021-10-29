<?php

use function PHPSTORM_META\map;

include("../conexion.php");
include_once("../rutas.php");
include("../cors.php");
//Instaciar a la clase de conexion
$bd = new Conexion();
cors();
$_POST = json_decode(file_get_contents("php://input"),true);
    //Validar si se dio clic en el boton Guardar
    if(isset($_POST['btnEliminar'])){
        //Recolectar de valores enviados
        $id = $_POST['id'];
        $sql = "DELETE FROM sitio WHERE sitioid= '".$id."';";
        //Ejecutando la insercion
        $rs = $bd->consultaSQL($sql);
        print json_encode(array("mensaje"=>"Se Actualizo correctamente."));
    }

?>
         