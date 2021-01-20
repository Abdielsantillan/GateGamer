<?php 
    require_once "../../Clases/categorias.php";
    $Categorias = new Categorias();

    echo json_encode($Categorias->obtenerCategorias($_POST['idCategoria']));


?>