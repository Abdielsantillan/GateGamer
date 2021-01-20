<?php
    session_start();
    require_once "../../Clases/gesto.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    
    echo $Gestor->allArchivos($idArchivo);
?>