<?php
    require_once('cors.php');

    require("./conexionContactos.php");
            $list = array();
            $conexion = new ConexionContactos();
            $db = $conexion->getConexionContactos();
            $query = "SELECT * FROM contacto";
            $statement = $db->prepare($query);
            $statement->execute();
            $vec=[];
            while($row = $statement->fetch()){
                $vec[]=$row;
            }
        $cad = json_encode($vec);
        echo $cad;
?>