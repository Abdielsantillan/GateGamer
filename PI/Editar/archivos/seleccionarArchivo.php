<?php 
    session_start();
    require_once "../../Clases/Conexion.php";
    $c  = new Conectar();
    $conexion = $c->conexion();

    $idUsuario =  $_SESSION['id_usuario'];
    $sql = "SELECT id_archivos, 
                   nombre  
            FROM t_archivos
            WHERE id_usuario ='$idUsuario'";
    $result = mysqli_query($conexion,$sql);
?>


<select name="categoriaPortada" id="categoriaPortada" class="form-control" action="../../Procesos/archivos/guardarPortada.php">
    <?php
        while($mostrar = mysqli_fetch_array($result)){
        $idArchivo = $mostrar['id_archivos'];
    ?>
        <option value="<?php echo $idArchivo ?>"> <?php echo $mostrar['nombre']; ?> </option>
    <?php
        }
    ?>
</select>