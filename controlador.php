<?php
    //Incluyendo el modelo
    include_once("modelo.php");
    include_once("cors.php");

    class ApiSitios{
        function getSitios(){
            cors();
            //instanciamiento para clase Sitios
            $sitio = new Sitios();
            
            //Crear array
            $sitios['items']=array();

            //Ejecutar consulta para mostrar sitios
            $res = $sitio->listarSitios();

            //Verificar si hay registros
            if(mysqli_num_rows($res)>0){
                //Recorrer arrar
                while($fila = mysqli_fetch_assoc($res)){
                    //Creando linea de array
                    $item = array(
                        "id"=>$fila["sitioid"],
                        "icono"=>$fila["imagenIcono"],
                        "titulo"=>$fila["titulo"],
                        "introduccion"=>$fila["introduccion"],
                        "imagenportada"=>$fila["imagenPortada"],
                        "descripcion"=>$fila["descripcion"]
                        );

                    //Agregando la linea al array principal
                    array_push($sitios["items"],$item);
                }//Fin de while

                //Mostrar el array final en pantalla
                echo json_encode($sitios);
            }else
                echo json_encode(array("mensaje"=>"No hay resultados"));
        }//Fin de getSitios
    }//Fin de ApiSitios
?>