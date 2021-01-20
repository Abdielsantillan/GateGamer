function agregarPortada(){
        var formData = new FormData(document.getElementById('frmArchivos2'));
               
        $.ajax({
           url:"../Procesos/archivos/guardarPortada.php",
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
                 $('#frmArchivos2')[0].reset();
                 $('#tablaGestorArchivos').load("tablaGestor.php");
                 swal(":D","Agregado con exito","success");
             }else{
                $('#frmArchivos2')[0].reset();
                 swal("X.X","Fallo al agreagr","error");
             }
           }
        });
}