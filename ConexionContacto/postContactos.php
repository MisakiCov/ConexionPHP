<?php
    require('./cors.php');
    require('./conexionContactos.php');
            $data = json_decode(file_get_contents('php://input'),true);
            $nombre = $data['nombre'];
            $telefono = $data['telefono'];
            $correo = $data['correo'];
            $conexion = new ConexionContactos();
            $db = $conexion->getConexionContactos();
            $query = "INSERT INTO contacto (nombre,telefono,correo) VALUES (:nombre,:telefono,:correo)";
            $statement=$db->prepare($query);
            $statement->bindParam(":nombre",$nombre);
            $statement->bindParam(":telefono",$telefono);
            $statement->bindParam(":correo",$correo);
            $result = $statement->execute();
            if($result){
                return "Elemento dado de alta";
            }
            return "Error";
?>