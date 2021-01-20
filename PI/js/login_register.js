function agregarUsuarioNuevo() { 
    var valor1 = document.getElementById("C1").value;
    var valor2 = document.getElementById("C2").value; 
    if (valor1 != valor2){
        $("#frmRegistro")[0].reset(); 
        swal("X.X", "Las Contraseñas no coinciden", "error");
        return false;
    }else{
        $.ajax({
            method: "POST",
            data: $('#frmRegistro').serialize(),
            url: "Procesos/Usuarios/Registros/agregarUsuario.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
               if(respuesta == '2'){
                    swal("Este usuario ya existe por favor ingresa otro");
                }
                else if(respuesta == 1){
                    $("#frmRegistro")[0].reset();
                    swal("Registrado", " Correctamente", "success");
                }else{
                    $("#frmRegistro")[0].reset();
                    swal("Erro al registrar usuario")
                }
            }
        });
        return false; 
    }
}
function login(){
        $.ajax({
            type: "POST",
            data: $('#frmLogin').serialize(),
            url: "Procesos/Usuarios/Login/login.php",
            success:function(respuesta){
             respuesta = respuesta.trim();
             if (respuesta == 1){
                 window.location ="sesion.php";
             }
            else if(respuesta == 3){
                window.location ="administrador/session.php";
             }
             else{
                 swal("Error ","Contraseña o usuario incorrectos");
                 }
             }
        });
        return false ; 
 }