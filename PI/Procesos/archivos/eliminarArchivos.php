<?php
    session_start();
    require_once "../../Clases/gesto.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    $idUsuario = $_SESSION['id_usuario'];

    $nombreArchivo = $Gestor->obtenerNombreArchivo($idArchivo);

    $rutaEliminar = "../../archivo/" . $idUsuario . "/". $nombreArchivo;
    
    if(unlink($rutaEliminar)){
        echo $Gestor->eliminarRegistroArchivo($idArchivo);
    }else{
        echo 0;
        }
?>