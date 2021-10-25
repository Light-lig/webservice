<?php
//Incluir el archivo de conexion
include_once("conexion.php");

//Aplicar herencia para la clase Conexion
class Usuarios extends Conexion{
    //Metodo para insertar registros
    function insertarUsuario($nombre,$usuario,$clave){
        //Variable local
        $token = "M0v173s!";
        $clave = sha1($token.$clave);

        $sql = "INSERT INTO usuarios(nombrecompleto,usuario,clave)
                VALUES('$nombre','$usuario','$clave');";
        $rs = $this->consultaSQL($sql);

        return $rs;
    }//Fin de insertarUsuarios

    //Mostrar registros de usuarios
    function listarUsuario($idUsuario){
        $sql = "SELECT
                    usuarioid,
                    nombrecompleto,
                    usuario,
                    clave
                FROM usuarios
                WHERE usuarioid = $idUsuario";
        $rs = $this->consultaSQL($sql);

        return $rs;
    }//Fin de listarUsuario

    //Metodo para modificar registros de usuario
    function modificarUsuario($idUsuario, $nombre, $usuario, $clave){
        //Variable local
        $token = "M0v173s!";
        $clave = sha1($token.$clave);
        
        $sql = "UPDATE usuarios SET
                    nombrecompleto  = '$nombre',
                    usuario         = '$usuario',
                    clave           = '$clave'
                WHERE usuarioid     = $idUsuario";
        
        $rs = $this->consultaSQL($sql);

        return $rs;
    }//Fin de modificarUsuario

    //Metodo para eliminar registros de usuarios
    function eliminarUsuario($idUsuario){
        $sql = "DELETE FROM usuarios WHERE usuarioid = $idUsuario";
        $rs = $this->consultaSQL($sql);

        return $rs;
    }//Fin de eliminarUsuario
}
?>