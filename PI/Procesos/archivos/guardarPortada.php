<?php 
        session_start();
        require_once "../../Clases/gesto.php";
        $idArchivo = $_POST['categoriaPortada'];
        $Gestor = new Gestor();
        $idUsuario = $_SESSION['id_usuario'];
      
        
        if( isset($_FILES['archivos2']['size']) > 0 ){

            $carpetaUsuario = '../../archivo/'.$idUsuario;

            if(!file_exists($carpetaUsuario)){
                mkdir($carpetaUsuario,0777,true);
            }
            
            $totalArchivos = count($_FILES['archivos2']['name']);
       
            for ($i=0; $i < $totalArchivos; $i++){
                
                $nombreArchivo = $_FILES['archivos2']['name'][$i];
                $explode = explode('.',$nombreArchivo);
                $tipoArchivo=array_pop($explode);
                
                $rutaAlmacenamiento = $_FILES['archivos2']['tmp_name'][$i];
                
                $rutaFinal = $carpetaUsuario.'/'.$nombreArchivo;
                $datosRegistroArchivo = array(
                                        "idUsuario"     => $idUsuario,
                                        "idArchivo"     => $idArchivo,
                                        "nombreArchivo" => $nombreArchivo, 
                                        "tipo"          => $tipoArchivo,
                                        "ruta"          => $rutaFinal

                );
                    if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                        $respuesta = $Gestor->agregarPortada($datosRegistroArchivo);
                }
            } 
            echo $respuesta;
        }else{
            echo 0;
        }

?>