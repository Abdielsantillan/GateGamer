function agreagarCategoria(){
    var categoria = $('#nombreCategoria').val();

    if(categoria == ""){
        swal("Debes agregar una categoria");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:"categoria=" + categoria,
            url:"../Procesos/Categorias/agregarCategorias.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");
                    $('#nombreCategoria').val("");
                    swal(":D","Agregado con exito","success");
                }else{
                   
                    swal("Hubo un problema al agregar la categorias");
                }
            }
        });
    }

}

function eliminarCategorias(idCategoria){
    idCategoria = parseInt(idCategoria);
    
    if(idCategoria < 1){
        swal("No tienes categorias!");
        return false;
    }else{
        //*********************************************************
        swal({
            title: "Estas seguro de eliminar esta categoria?",
            text: "Una vez eliminada no podras recuperalo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                  type:"POST",
                  data:"idCategoria=" + idCategoria,
                  url:"../Procesos/Categorias/eliminarCategorias.php",
                  success:function(respuesta){
                      respuesta = respuesta.trim();
                      if(respuesta == 1){
                        $('#tablaCategorias').load("categorias/tablaCategoria.php");
                        swal("Eliminado correctamente", {
                                icon:"success"});
                      }else{
                          swal("Fallo al eliminar")
                      }
                  }
              })
            } 
          });
        
        //***************/
    }
}

function obterDatosCategoria(idCategoria){
    $.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../Procesos/Categorias/obtenerCategoria.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idCategoria').val(respuesta['idCategoria']);
            $('#categoriaU').val(respuesta['nombreCategoria']);
        }
    })
}

function actualizaCategoria(){
    if($('#categoriaU').val() == ""){
        swal("No hay categoria!!");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizaCategoria').serialize(),
            url:"../Procesos/Categorias/actualizaCategorias.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");
                    swal(":D","Actualizado con exito","success");
                }else{
                    swal("X.X ","Fallo al actualizar","error");
                }

            }
        });
    }
}