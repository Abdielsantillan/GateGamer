<?php 
 require_once '../../../Clases/usuario.php';
  $password = sha1($_POST['contrasena1']);
  $cargo = 0;
  $datos = array(
        "usuario"    => $_POST['usuario'],  
        "nombre"     => $_POST['nombre'],
        "apellido"   => $_POST['apellido'],    
        "password"   => $password,
        "idCargo"    => $cargo
  ); 

    $usuario = new Usuario();
    echo $usuario->agregarUsuario($datos);
?>