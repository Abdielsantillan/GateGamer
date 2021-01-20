<?php
    session_start();
    require_once "../../Clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario =$_SESSION['id_usuario'];
    $sql ="SELECT 
                    archivos.id_archivos as idArchivo,
                    usuario.usuario as nombrUsuario,
                    categorias.nombre as categoria,
                    archivos.nombre as nombraArchivo,
                    archivos.tipo as tipoArchivo,
                    archivos.ruta as rutaArchivo,
                    archivos.fecha as fecha
                FROM
                    t_archivos AS archivos
                        INNER JOIN
                    user AS usuario ON archivos.id_usuario = usuario.id_usuario
                        INNER JOIN
                    t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                    and archivos.id_usuario ='$idUsuario'";
    $result = mysqli_query($conexion,$sql);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-resposive">
            <table class="table table-hover table-dark" id="tableGestorDataTable">
                <thead>
                    <tr>
                        <th>categoria</th>
                        <td>Nombre</td>
                        <td>Tipo de archivo</td>
                        <td>Descargar</td>
                        <td>Visualizar</td>
                        <td>Eliminar</td>
                        <td>Agregar Portada</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        /* Arreglo de extenciones validas*/

                        $extencionesValidas = array('png','jpg','pdf','PNG');




                        while($mostrar = mysqli_fetch_array($result)){
                            $rutaDescarga = "../../archivo/".$idUsuario."/".$mostrar['nombraArchivo'];
                            $nombreArchivo = $mostrar['nombraArchivo'];
                            $idArchivo = $mostrar['idArchivo'];
                    ?>
                    <tr>
                        <td><?php echo $mostrar['categoria'];     ?> </td>
                        <td><?php echo $mostrar['nombraArchivo']; ?> </td>
                        <td><?php echo $mostrar['tipoArchivo'];   ?> </td>
                        <td>
                            <a href="<?php echo $rutaDescarga; ?>" 
                            download="<?php echo $nombreArchivo;?>"
                            class ="btn btn-success btn-ml">
                               <span class="fas fa-download"></span>
                            </a>
                        </td>
                        <td>
                            <?php
                                for ($i=0; $i < count($extencionesValidas); $i++) { 
                                    if ( $extencionesValidas[$i] == $mostrar['tipoArchivo']) {
                            ?>
                                <span class="btn btn-primary btn-sm " data-toggle="modal" data-target="#vizualizarArchivo" onclick="obteneraArchivoporId('<?php echo $idArchivo ?>')">
                                    <span class="fas fa-eye"></span>
                                </span>
                            <?php
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <sapan class="btn btn-danger btn-sm" onclick= "eliminarArchivo('<?php  echo $idArchivo ?>')">
                                <span class="far fa-trash-alt"></span>
                            </sapan>
                           
                        </td>
                        <td> 
                            <span class="btn btn btn-info btn-sm"  data-toggle="modal" data-target="#modalAgregarPortada">
                                <span class="fas fa-images"></span>
                            </span>
                                
                        </td>
                     </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Agregar Portada-->
<div class="modal fade" id="modalAgregarPortada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega tu portada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmArchivos2" enctype="multipart/form-data" method="POST">
          <label >Archivo</label>
          <div id="archivosLoad"></div>
          <label> Selecciona archivos</label>
          <input type="file" name="archivos2[]" id="archivos2[]" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnGuardarPortada">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/archivos.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableGestorDataTable').DataTable();
        $('#archivosLoad').load("archivos/seleccionarArchivo.php");      
        $('#btnGuardarPortada').click(function(){
            agregarPortada();
        });
    } );
 
</script>