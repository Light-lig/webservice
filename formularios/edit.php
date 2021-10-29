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
                if(isset($_POST['btnGuardar'])){
                    //Recolectar de valores enviados
                    $id = $_POST['id'];
                    $txtTitulo = $_POST['titulo'];
                    $txtIntroduccion = $_POST['introduccion'];
                    $txtDescripcion = $_POST['descripcion'];

                    $sql = "UPDATE sitio SET ";
                    //Trabajado con las imagenes
                    if($_POST["btnIcono"]["name"] !== 'f'){
                        $prefijo = substr(md5(uniqid(rand())),0,6);
                    
                        //icono
                        $icono = $_POST["btnIcono"]["name"].$prefijo;
                        $decoded=base64_decode(explode(',',$_POST["btnIcono"]["uri"])[1]);
                        file_put_contents("../imagenes/iconos/".$icono.".JPG",$decoded);
                        $sql .= "imagenIcono='".$icono.".JPG',";
                    }
                    if($_POST["btnPortada"]["name"] !== 'f'){
                        $prefijo2 = substr(md5(uniqid(rand())),0,6);
    
                        //Portada
                        $portada = $_POST["btnPortada"]["name"].$prefijo2;
                   
                        //Especificar la ruta
                        $decodedportada=base64_decode(explode(',',$_POST["btnPortada"]["uri"])[1]);                    //Copiar al servidor
                        file_put_contents('../imagenes/sitios/'.$portada.".JPG",$decodedportada);
                        $sql .= "imagenPortada='".$portada.".JPG',";
                    }
                        

                   
                    //Registrando los datos al servidor de base de datos
                    
                   
                    $sql .= "titulo='".$txtTitulo."', 
                    introduccion='".$txtIntroduccion."',
                    descripcion='".$txtDescripcion."' 
                    WHERE sitioid= '".$id."';";
                    //Ejecutando la insercion
                    $rs = $bd->consultaSQL($sql);
                    print json_encode(array("mensaje"=>"Se Actualizo correctamente."));
                }

            ?>
         