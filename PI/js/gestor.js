function agregarArchivosGestor(){
    var formData = new FormData(document.getElementById('frmArchivos'));
           
    $.ajax({
       url:"../Procesos/archivos/guardarArchivos.php",
       type:"POST",
       datatype: "html",
       data: formData,
       cache: false,
       contentType: false,
       processData:false,
       success:function(respuesta){
        console.log(respuesta);
        respuesta = respuesta.trim();
        if(respuesta == 1){
             $('#frmArchivos')[0].reset();
             $('#tablaGestorArchivos').load("Gestor/tablaGestor.php");
             swal(":D","Agregado con exito","success");
         }else{
            $('#frmArchivos')[0].reset();
             swal("X.X","Fallo al agreagr","error");
         }
       }
    });
}
function eliminarArchivo(idArchivo){
    swal({
        title: "Estas seguro de elimar este archivo?",
        text: "Una vez eliminado, No podras recuperarlo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
              type: "POST",
              data: "idArchivo=" + idArchivo,
              url:"../Procesos/archivos/eliminarArchivos.php",
              success:function(respuesta){

                respuesta = respuesta.trim();
                if (respuesta == 1){
                   
                    $('#tablaGestorArchivos').load("Gestor/tablaGestor.php");
                    swal("Eliminado con exiro!", {
                        icon: "success",
                  });
                }
                else{
                    swal("Error al eliminar!", {
                        icon: "success",
                    }); 
                }
            }
        });
       }
      });
}
function obteneraArchivoporId(idArchivo){
    $.ajax({
        type:"POST",
        data:"idArchivo=" + idArchivo,
        url:"../Procesos/archivos/obtenerArchivo.php",
        success:function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    });
}
function allArchivos(idArchivo){
    $.ajax({
        type:"POST",
        data:"idArchivo=" + idArchivo,
        url:"../Procesos/archivos/allArchivos.php",
        success:function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    });
}
