<?php
    require_once('cors.php');

    require("./conexion.php");
            $list = array();
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $query = "SELECT * FROM productos";
            $statement = $db->prepare($query);
            $statement->execute();
            $vec=[];
            while($row = $statement->fetch()){
                $vec[]=$row;
            }
        $cad = json_encode($vec);
        echo $cad;
?>
