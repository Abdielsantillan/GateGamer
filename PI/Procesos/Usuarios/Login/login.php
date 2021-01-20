<?php 
session_start();
    require_once "../../../Clases/Usuario.php";
    $usuario = $_POST['userName'];
    $password = sha1($_POST['contrasena']);

    $usuarioObj = new Usuario();

    echo $usuarioObj->login($usuario,$password);


?>