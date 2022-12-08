<?php
    class ConexionContactos{

        public static function getConexionContactos(){
            $server = "localhost";
            $db = "dweb";
            $user = "root";
            $password = "Arno62459!";

            try{
                $conn = new PDO("mysql:host=$server;dbname=$db",$user,$password);
            }
            catch(PDOException $exp){
                echo ("No se logro conectar correctamente");
            }
            return $conn;
        }
    }

?>
