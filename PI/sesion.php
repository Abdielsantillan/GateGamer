<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("Por favor Iniciar sesion");
                window.location ="index.php";
            </script>
        ';
        session_destroy();
        die();
    }
?>
<?php
    include "header_session.php";
    require_once "Clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $usurio = $_SESSION['usuario'];
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
                    and archivos.id_usuario ='$idUsuario' ";
    $result = mysqli_query($conexion,$sql);
?>

  <body>

  <!--Aqui termina-->
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1>GateGamer</h1>
      <p class="lead text-muted">
        Un portal Hacia los video juegos. 
      </p>
      <p>
          <?php echo "Bienvenido ", $usurio?>
      </p>
    </div>
  </section>
  <?php
      while($mostrar = mysqli_fetch_array($result)){
        $rutaDescarga = "archivo/".$idUsuario."/".$mostrar['nombraArchivo'];
        $nombreArchivo = $mostrar['nombraArchivo'];
        $idArchivo = $mostrar['idArchivo'];
    
    ?>
    <div class="container">
    <div class="row">
        <div class="col align-self-center">
          <div class="card mb-2 shadow-sm">
              <img width="100%" src="images/genshin-impact-gameplay.jpg"  >
            <div class="card-body">
                <p class="card-text"><?php echo $mostrar['nombraArchivo']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <span class="btn btn-primary btn-sm " data-toggle="modal" data-target="#vizualizarArchivo" onclick="obteneraArchivoporId('<?php echo $idArchivo ?>')">
                      <span class="fas fa-eye"> View </span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <?php
      }
    ?>
    <!-- Modal visualizar archivos-->
<div class="modal fade" id="vizualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</main>
<script src="js/gestor.js"></script>
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
 
</footer>
<?php
  include "Editar/footer.php";


?>
