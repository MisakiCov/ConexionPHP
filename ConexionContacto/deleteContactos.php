<?php
require('./conexionContactos.php');
require('./cors.php');
    $data = json_decode(file_get_contents('php://input'),true);
    $id = $data['telefono'];
    $conexion = new ConexionContactos();
    $db = $conexion->getConexionContactos();
    $query = "DELETE FROM contacto WHERE telefono = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(':id',$id);
    $result = $statement->execute();
    if($result){
        return "removed";
    }
    return "error";