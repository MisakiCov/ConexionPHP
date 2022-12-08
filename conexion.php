<?php
    class Conexion{
        // Clase de conexion para entrar a la base de datos seleccionada.
        public static function getConexion(){
            //Función para iniciar la conexión
            $server = "localhost";
            //instanciar variable server con el nombre del host
            $db = "dweb";
            // instanciar la variable db con el nombre de la base de datos
            $user = "root";
            // instanciar la variable user con el nobmre de usuario
            $password = "Arno62459!";
            // instanciar la variable password con la contraseña de acceso

            try{
                $conn = new PDO("mysql:host=$server;dbname=$db",$user,$password);
                // tratar de realizar la conexion utilizando los parametros especificados
            }
            catch(PDOException $exp){
                echo ("No se logro conectar correctamente");
                // En caso de error, mostrar mensaje de fallo
            }
            return $conn;
        }
    }

?>
