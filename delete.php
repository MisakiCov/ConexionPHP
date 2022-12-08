<?php
// archivo para eliminar elementos de la tabla productos
require('./conexion.php');
// requerimiento del archivo conexion
require('./cors.php');
// requerimiento del archivo cors
    $data = json_decode(file_get_contents('php://input'),true);
    $id = $data['sabor'];
    // instancia de la variable id con el valor que se tomara en cuenta para borrar
    $conexion = new Conexion();
    // instancia de la variable conexion llamando a la funcion conexion
    $db = $conexion->getConexion();
    // instancia de la variable db solicitando la funcion getconexion.
    $query = "DELETE FROM productos WHERE sabor=:id";
    // instancia de la variable query con la solicitud a emplear dentro de SQL
    $statement = $db->prepare($query);
    // instancia de statement para preparar el query
    $statement->bindParam(':id',$id);
    // solicitud de statement bindeando el parametro con su respectivo id
    $result = $statement->execute();
    // instancia de result con la solicitud de ejecucion
    if($result){
        return "removed";
        // mensaje de retorno exitoso
    }
    return "error";
?>