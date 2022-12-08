<?php
    require_once('./cors.php');
    require('./conexion.php');
            $data = json_decode(file_get_contents('php://input'),true);
            $sabor = $data['sabor'];
            $precio = $data['precio'];
            $descripcion = $data['descripcion'];
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $query = "INSERT INTO productos (sabor,precio,descripcion) VALUES (:sabor,:precio,:descripcion)";
            $statement=$db->prepare($query);
            $statement->bindParam(":sabor",$sabor);
            $statement->bindParam(":precio",$precio);
            $statement->bindParam(":descripcion",$descripcion);
            $result = $statement->execute();
            if($result){
                return "Elemento dado de alta";
            }
            return "Error";
?>