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
                    $txtTitulo = $_POST['titulo'];
                    $txtIntroduccion = $_POST['introduccion'];
                    $txtDescripcion = $_POST['descripcion'];

                    //Trabajado con las imagenes
                    $prefijo = substr(md5(uniqid(rand())),0,6);
                    
                    //icono
                    $icono = $_POST["btnIcono"]["name"].$prefijo;
                    $decoded=base64_decode(explode(',',$_POST["btnIcono"]["uri"])[1]);
                    file_put_contents("../imagenes/iconos/".$icono.".JPG",$decoded);
                   
                    $prefijo2 = substr(md5(uniqid(rand())),0,6);

                    //Portada
                    $portada = $_POST["btnPortada"]["name"].$prefijo2;
               
                    //Especificar la ruta
                    $decodedportada=base64_decode(explode(',',$_POST["btnPortada"]["uri"])[1]);                    //Copiar al servidor
                    file_put_contents('../imagenes/sitios/'.$portada.".JPG",$decodedportada);

                    //Registrando los datos al servidor de base de datos
                    $sql = "INSERT INTO 
                                sitio(
                                    imagenIcono,
                                    titulo,
                                    introduccion,
                                    imagenPortada,
                                    descripcion) 
                            VALUES(
                                '".$icono.".JPG',
                                '".$txtTitulo."',
                                '".$txtIntroduccion."',
                                '".$portada.".JPG',
                                '".$txtDescripcion."')";
                    //Ejecutando la insercion
                    $rs = $bd->consultaSQL($sql);
                    print json_encode(array("mensaje"=>"Se guardo correctamente."));
                }

            ?>
         