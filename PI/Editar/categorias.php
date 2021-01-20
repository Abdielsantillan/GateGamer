<?php 
    session_start();
    if (isset($_SESSION['usuario'])){
        include "header.php";

?>
    <div class="jumbotron jumbotron-fuid">
        <div class="container">
            <h1 class="display-4">Categorias</h1>
            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
                        <span  class="fas fa-plus-circle"></span>Agregar una categoria
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCategorias">
            <label >Nombre de la categoria</label>
            <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCategorias">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal2 -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id ="frmActualizaCategoria">
          <input type="text" id="idCategoria" name="idCategoria" hidden="">
          <label > Categoria</label>
          <input type="text" id="categoriaU" name="categoriaU" class="form-control">
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php include "footer.php";?>
<script src="../js/categorias.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
        $('#tablaCategorias').load("categorias/tablaCategoria.php");

        $('#btnGuardarCategorias').click(function(){
            agreagarCategoria();
        });
        $('#btnActualizaCategoria').click(function(){
            actualizaCategoria();
        });
    } );
</script>
<?php
        include "footer.php";
    }else{
        header("location:../index.php");
    } 
?>

