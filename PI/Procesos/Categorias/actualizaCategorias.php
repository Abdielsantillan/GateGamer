<?php
    require_once "../../Clases/categorias.php";
    $Categorias = new Categorias();
    $datos = array(
        
                "categoria"   => $_POST['categoriaU'],
                "idCategoria" => $_POST['idCategoria']
                
    );
    echo $Categorias-> actualizarCategoria($datos);
?>