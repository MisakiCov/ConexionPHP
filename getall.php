<?php
    require_once('cors.php');
    // requerir el archivo cors
    require("./conexion.php");
    // requerir el archivo conexion
            $list = array();
            $conexion = new Conexion();
            // instancia de conexion con la funcion de Conexion()
            $db = $conexion->getConexion();
            // instancia de db con la funcion de getConexion()
            $query = "SELECT * FROM productos";
            //instancia de query con la solicitud a realizar en SQL
            $statement = $db->prepare($query);
            //instancia de statement preparando la solicitud query
            $statement->execute();
            // instancia de statement para ejecutar
            $vec=[];
            // instancia de vector
            while($row = $statement->fetch()){
                $vec[]=$row;
            }
        $cad = json_encode($vec);
        echo $cad;
?>
