<?php
//Incluir la clase de conexion
include_once("conexion.php");

class Sitios extends Conexion{
    //Metodos para interaccion con la base de datos
    //Mostrar registros de frutas
    function listarSitios(){
        $sql = "SELECT
                    sitioid,
                    imagenIcono,
                    titulo,
                    introduccion,
                    imagenPortada,
                    descripcion
                from sitio";
        $rs = $this->consultaSQL($sql);

        return $rs;
    }//Fin de listarSitios
}

?>