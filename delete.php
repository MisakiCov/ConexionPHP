<?php
require('./conexion.php');
require('./cors.php');
    $data = json_decode(file_get_contents('php://input'),true);
    $id = $data['sabor'];
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "DELETE FROM productos WHERE sabor=:id";
    $statement = $db->prepare($query);
    $statement->bindParam(':id',$id);
    $result = $statement->execute();
    if($result){
        return "removed";
    }
    return "error";
?>