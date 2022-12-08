<?php
    class Conexion{
        // 

        public static function getConexion(){
            $server = "localhost";
            $db = "dweb";
            $user = "root";
            $password = "Arno62459!";

            try{
                $conn = new PDO("mysql:host=$server;dbname=$db",$user,$password);
                //echo ("Se realizó de manera exitosa la conexion");
            }
            catch(PDOException $exp){
                echo ("No se logro conectar correctamente");
            }
            return $conn;
        }
    }

?>
