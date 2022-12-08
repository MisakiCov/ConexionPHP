<?php
    class Controller{
        public function GetProductos(){
            try{
                $list = array();
                $conexion = new Conexion();
                $db = $conexion->getConexion();
                $query = "SELECT * FROM productos";
                $statement = $db->prepare($query);
                $statement->execute();

                while($row = $statement->fetch()){
                    $list[]  = array(
                        "sabor"=>$row['sabor'],
                        "precio"=>$row['precio'],
                        "descripcion"=>$row['descripcion']);
                }
                return $list;
            }
            catch(PDOException $e){
                echo "Error", $e->getMessage();
            }
        }

        public function addProductos($data){
            try{
                $sabor = $data['sabor'];
                $precio = $data['precio'];
                $descripcion = $data['descripcion'];
                $conexion = new Conexion();
                $query = "INSERT INTO productos (sabor,precio,descripcion) VALUES (:sabor,:precio,:descripcion)";
                $db = $conexion->getConexion();
                $statement=$db->prepare($query);
                $statement->bindParam(":sabor",$sabor);
                $statement->bindParam(":precio",$precio);
                $statement->bindParam(":descripcion",$descripcion);
                $result = $statement->execute();
                if($result){
                    return "Elemento dado de alta";
                }
            }
            catch(PDOException $e){
                return "Error".$e->getMessage();
            }
        }
    }

?>