<?php
    require_once('./cors.php');
    // requerimiento de cors.php
    require('./conexion.php');
    // requerimiento de conexion.php
            $data = json_decode(file_get_contents('php://input'),true);
            $sabor = $data['sabor'];
            $precio = $data['precio'];
            $descripcion = $data['descripcion'];
            // instancia de las variables con los diferentes valores de la tabla
            $conexion = new Conexion();
            // instancia de conexion con la funcion Conexion()
            $db = $conexion->getConexion();
            // instancia de db con la funcion getConexion()
            $query = "INSERT INTO productos (sabor,precio,descripcion) VALUES (:sabor,:precio,:descripcion)";
            // instancia de query con la solicitud a realizar en SQL
            $statement=$db->prepare($query);
            //instancia para preparar query
            $statement->bindParam(":sabor",$sabor);
            $statement->bindParam(":precio",$precio);
            $statement->bindParam(":descripcion",$descripcion);
            // instancias para bindear los parametros dentro de sus variables
            $result = $statement->execute();
            // ejecucion de los parametros
            if($result){
                return "Elemento dado de alta";
                // mensaje de confirmacion exitosa
            }
            return "Error";
?>