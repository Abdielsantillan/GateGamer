
<?php
    session_start();
    require_once "../../Clases/Conexion.php";
    $idUsuario = isset($_SESSION['id_usuario']);
    $conexion = new Conectar();
    $conexion = $conexion->conexion();

?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaCategoriasDataTable">
        <thead>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>


        <?php
            $sql ="SELECT id_categoria,
                          nombre,
                          fechaInsert
                          
                  FROM t_categorias
                  WHERE id_usuario ='$idUsuario'";
            $result = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_array($result)){
                $idCategoria = $mostrar['id_categoria'];
        ?>

            <tr  style="text-aling: center;">
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><?php echo $mostrar['fechaInsert'] ?></td>
                <td>
                    <span class="btn btn-warning btn-sm" onclick="obterDatosCategoria('<?php echo $idCategoria?>')"data-toggle="modal" data-target="#modalActualizarCategoria">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td >
                    <sapan class="btn btn-danger" onclick="eliminarCategorias('<?php echo $idCategoria?>')">
                        <span class="far fa-trash-alt"></span>
                    </span>
                </td>
            </tr>

               <?php
                }
               ?> 

        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaCategoriasDataTable').DataTable();
    } );

</script>