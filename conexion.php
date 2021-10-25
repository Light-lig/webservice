<?php
/**********************************************************************************
ARCHIVO: CONEXION.PHP
PROPOSITO: Manejar las conexiones de la base de datos por medio de una clase
**********************************************************************************/
// ----- EN ESTE ARCHIVO, EL VALOR DE ESTAS VARIABLES PUEDEN SER MODIFICADAS
// ----- FIN DE VARIABLES MODIFICABLES
// Definición de Clase Conexion
class Conexion{
    protected $servidor; // Servidor (Host) donde se encuentra la BD
    protected $baseEsquema; // Nombre del Esquema a utilizar
    protected $usuario; // Usuario con permiso de usar la BD
    protected $password; // Contraseña del usuario
    protected $error; // Guardar el tipo de error en la ejecución del programa
    protected $link; // Guarda la conexión a la base de datos
    protected $charset; // Establece el tipo de interpretación de los caracteres

    function __construct()
    {
        $this->charset = "utf8mb4";
        $this->servidor = "localhost";
        $this->baseEsquema = "turismo";
        $this->usuario = "root";
        $this->password = "";

        $this->link = mysqli_connect($this->servidor,
                                $this->usuario,
                                $this->password,
                                $this->baseEsquema);

        mysqli_set_charset($this->link,$this->charset);

        if(!$this->link){
            $this->error = json_encode(array("mensaje"=>"error"));

            $this->mostrarError();
        }
    }
    
    //METODOS UTILITARIOS
    public function cerrarConexion(){
        return (mysqli_close($this->link));
    }

    public function mostrarError(){
        echo ($this->error);
        exit();
    }

    public function consultaSQL($sql){
        if(!($resultado = mysqli_query($this->link,$sql))){
            $this->error = "Error".$this->link->error;
            $this->mostrarError();
        }else{
            return($resultado);
        }
    }//Fin de consultaSQL
}
?>