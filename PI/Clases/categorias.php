<?php
    require_once "Conexion.php";
    class Categorias extends Conectar{
        public function agregarCategoria($datos) {
            $conexion = Conectar::conexion();
            
            $sql = "INSERT INTO t_categorias (id_usuario,nombre)
                            VALUES (?, ?) ";
            $query = $conexion->prepare($sql);
            $query->bind_param("is", $datos['id_usuario'],
                                    $datos['categoria']);

            $repuesta = $query->execute();
            $query->close();
            return $repuesta;
        }
        public function eliminarCategoria($idCategoria){
            $conexion = Conectar::conexion();

            $sql ="DELETE FROM t_categorias 
                    WHERE id_categoria =?";
            $query =$conexion->prepare($sql);
            $query->bind_param('i',$idCategoria);
            $repuesta = $query->execute();
            $query->close();
            return $repuesta;
        }
    
        public function obtenerCategorias($idCategoria){
            $conexion = Conectar::conexion();
            $sql ="SELECT id_categoria, nombre 
                FROM t_categorias 
                WHERE id_categoria = '$idCategoria' ";
            $result = mysqli_query($conexion,$sql);

            $categoria = mysqli_fetch_array($result);
            $datos = array(
                "idCategoria" => $categoria['id_categoria'],
                "nombreCategoria" =>$categoria['nombre']
                );
            return $datos;  
        }

        public function actualizarCategoria($datos){
            $conexion = Conectar::conexion();

            $sql = "UPDATE t_categorias 
                    SET nombre = ? 
                    WHERE id_categoria = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("si",  $datos['categoria'],
                                      $datos['idCategoria']);

            $repuesta = $query-> execute();
            $query->close();
            return $repuesta;
        }
    }
?>