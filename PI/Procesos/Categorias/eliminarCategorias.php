<?php
    session_start();
    require_once "../../Clases/categorias.php";
    $Categorias = new Categorias();
    echo $Categorias->eliminarCategoria($_POST['idCategoria']);


?>