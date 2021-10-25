<?php
//Incluyendo el modelo
include_once("modeloUsuario.php");

class ApiUsuarios{
    //Metodo para retornar registros de usuario
    function getUsuario($idUsuario){
        //Instanciamiento para la clase Usuarios
        $user = new Usuarios();

        //Crear el array Json
        $userArray["items"] = array();

        //Ejecutar el metodo para consulta SQL
        $res = $user->listarUsuario($idUsuario);

        //Verificar si hay lineas retornadas
        if(mysqli_num_rows($res)>0){
            //Recorrer el array de resultado
            while($fila = mysqli_fetch_assoc($res)){
                $item = array(
                    "usuarioid"=>$fila["usuarioid"],
                    "nombre"=>$fila["nombrecompleto"],
                    "usuario"=>$fila["usuario"],
                    "clave"=>$fila["clave"]
                );
                
                //Agregando array auxiliar con array JSON
                array_push($userArray["items"],$item);
            }//Fin de while

            //Mostrar el array final
            echo json_encode($userArray);
        }else
            echo json_encode(
                array("mensaje"=>"No hay resultados para mostrar"));

    }//Fin de getUsuario

    function addUsuarios($nombre,$alias,$clave){
        //Instanciar a la clase de Usuarios
        $usuario = new Usuarios();

        //Evaluando el resultado de la insercion
        if($usuario->insertarUsuario($nombre,$alias,$clave))
            echo "Registro almacenado correctamente";
        else
            echo "Se produjo un error al insertar";
    }//FIn de addUsuarios

    //Metodo para actualizar registros de usuario
    function updateUsuarios($idUsuario, $nombre, $alias, $clave){
        //Instanciar a la clase Usuarios
        $usuario = new Usuarios();

        //Ejecutar el proceso de actualizacion 
        if($usuario->modificarUsuario($idUsuario, $nombre, $alias, $clave))
            echo "Registro modificado correctamente";
        else
            echo "Se produjo un error al intentar modificar";
    }//Fin de updateUsuarios

    //Metodo para eliminar registros de usuarios
    function deleteUsuarios($idUsuario){
        //Instanciar a la clase Usuarios
        $usuario = new Usuarios();
        
        //Ejecutar el proceso de actualizacion 
        if($usuario->eliminarUsuario($idUsuario))
            echo "Registro eliminado correctamente";
        else
            echo "Se produjo un error al intentar modificar";
    }//Fin de deleteUsuarios
}//Fin de ApiUsuarios
?>