<?php 
        session_start();
        require_once "../../Clases/gesto.php";
        $idCategoria = $_POST['categoriasArchivos'];
        $Gestor = new Gestor();
        $idUsuario = $_SESSION['id_usuario'];
        

        if( isset($_FILES['archivos']['size']) > 0 ){

            $carpetaUsuario = '../../archivo/'.$idUsuario;

            if(!file_exists($carpetaUsuario)){
                mkdir($carpetaUsuario,0777,true);
            }
            
            $totalArchivos = count($_FILES['archivos']['name']);
       
            for ($i=0; $i < $totalArchivos; $i++){
                
                $nombreArchivo = $_FILES['archivos']['name'][$i];
                $explode = explode('.',$nombreArchivo);
                $tipoArchivo=array_pop($explode);
                
                $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
                
                $rutaFinal = $carpetaUsuario.'/'.$nombreArchivo;
                $datosRegistroArchivo = array(
                                        "idUsuario" => $idUsuario,
                                        "idCategoria" => $idCategoria,
                                        "nombreArchivo" => $nombreArchivo, 
                                        "tipo" => $tipoArchivo,
                                        "ruta" => $rutaFinal

                );
                    if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                        $respuesta = $Gestor->agregarRegistroArchivo($datosRegistroArchivo);
                }
            } 
            echo $respuesta;
        }else{
            echo 0;
        }

?>