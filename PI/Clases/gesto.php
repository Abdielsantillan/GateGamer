<?php
    require_once "Conexion.php";
    class Gestor extends Conectar{
        
        public function agregarRegistroArchivo($datos){
            $conexion = Conectar::conexion(); 
            $sql ="INSERT INTO t_archivos( id_usuario,
                                            id_categoria,
                                            nombre,
                                            tipo,
                                            ruta) 
                                            VALUES (?,?,?,?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param("iisss" ,$datos['idUsuario']
                                       ,$datos['idCategoria']
                                       ,$datos['nombreArchivo']
                                       ,$datos['tipo']
                                       ,$datos['ruta']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function agregarPortada($datos){
            $conexion = Conectar::conexion(); 
            $sql ="INSERT INTO t_portada(   id_usuario,
                                            id_archivo,
                                            nombre,
                                            ruta,
                                            tipo) 
                                            VALUES (?,?,?,?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param("iisss" ,$datos['idUsuario']
                                       ,$datos['idArchivo']
                                       ,$datos['nombreArchivo']
                                       ,$datos['ruta']
                                       ,$datos['tipo']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function obtenerNombreArchivo($idArchivo){
            $conexion = Conectar::conexion();
            $sql="SELECT nombre 
                    FROM t_archivos 
                    WHERE id_archivos ='$idArchivo'";
            $result = mysqli_query($conexion,$sql);

            return mysqli_fetch_array($result)['nombre'];

        }

        public function eliminarRegistroArchivo($idArchivo){
            $conexion = Conectar::conexion();
            $sql ="DELETE FROM t_archivos WHERE id_archivos =?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idArchivo);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function obtenerRutaArchivo($idArchivo){
            $conexion = Conectar::conexion();

            $sql ="SELECT nombre, tipo FROM t_archivos WHERE id_archivos = '$idArchivo'";
            $result = mysqli_query($conexion, $sql);
            $datos =  mysqli_fetch_array($result);
            $nombreArchivo = $datos['nombre'];
            $extencion = $datos['tipo'];
            return self::tipoArchivo($nombreArchivo,$extencion);
         
        }
        public function allArchivos($idArchivo){
            $conexion = Conectar::conexion();
            $sql ="SELECT nombre, tipo,id_usuario FROM t_archivos WHERE id_archivos = '$idArchivo'";
            $result = mysqli_query($conexion, $sql);
            $datos =  mysqli_fetch_array($result);
            $usuario = $datos['id_usuario'];
            $nombreArchivo = $datos['nombre'];
            $extencion = $datos['tipo'];
            return self::tipoArchivoAll($nombreArchivo,$extencion,$usuario);
        }
        public function tipoArchivoAll($nombreArchivo,$extencion,$usuario){
            $ruta = "../../archivo/".$usuario."/".$nombreArchivo;
            switch ($extencion) {
                case 'PNG':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;   
                case 'pdf':
                    return ' <embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                        break; 
                case 'png':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;
                case 'jpg':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;
                case 'JPG':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;
            }
        }
        public function tipoArchivo($nombreArchivo, $extencion){
            $idUsuario = $_SESSION['id_usuario'];
            $ruta = "../../archivo/".$idUsuario."/".$nombreArchivo;
            switch ($extencion) {
                case 'PNG':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;   
                case 'pdf':
                    return ' <embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                        break; 
                case 'png':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;
                case 'jpg':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;
                case 'JPG':
                    return ' <img src="'.$ruta.'" width="100%">';
                    break;
            }
        }
    }

?>