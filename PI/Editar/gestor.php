<?php 
    session_start();
    if (isset($_SESSION['usuario'])){
        include "header.php"
        
?>
<!--Boton para agregar archivos -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Sube tu revista GateGamer</h1>
    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
          <span class="fas fa-plus-circle"></span> Agregar Revistas
    </span>
    <hr>
    <div id="tablaGestorArchivos"></div>
  </div>
</div>
<!-- Modal para agregar archivos-->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega tus revitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmArchivos" enctype="multipart/form-data" method="POST">
          <label >Categoria</label>
          <div id="categoriasLoad"></div>
          <label> Selecciona archivos</label>
          <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Save changes</button>
      </div>
    </div>
  </div>
</div>



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


<?php include "footer.php";?>
<script src="../js/gestor.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
        $('#tablaGestorArchivos').load("Gestor/tablaGestor.php");
        $('#categoriasLoad').load("categorias/selecCategorias.php");
        $('#btnGuardarArchivos').click(function(){
          agregarArchivosGestor();
        });
    });
</script>
<?php include "footer.php";
    }else{
        header("location:../index.php");
    } 
?>
