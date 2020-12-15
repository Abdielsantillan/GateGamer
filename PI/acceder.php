<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y registro</title>
    <link rel="stylesheet" href="assets/CSS/estilos.css">
</head>
<body>
    <main>
        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera_login">
                    <h3>¿Ya tienes cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="btn_sesion">Iniciar sesion</button>
                </div>
                <div class="caja_trasera_register">
                    <h3>¿Aun no tienes cuenta?</h3>
                    <p>Registrate para que puedas inisiar sesion</p>
                    <button id="btn_registrarse">Registrate</button> 
                    
                </div>
            </div>
            <!--Formulario de login y de registro-->
            <div class="contenedor_login_register">
                <!--Login-->
                <form id="frmLogin" method ="POST" class="formulario__login" onsubmit="return login()">
                    <h2>Iniciar sesion</h2>
                    <input type="text" placeholder="Usuario" name = "userName" required="">
                    <input type="password" placeholder="Contraseña" name ="contrasena" required="">
                    <button class="btn btn-primary"> Entrar </button> <a href="index.php" class="btn btn-primary my-2">Regresar</a>
                </form>
                <!--Registro-->
                <form id ="frmRegistro" method ="POST" class="formulario__register" onsubmit ="return agregarUsuarioNuevo()" >
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Usuario" name ="usuario" required="">
                    <input type="email" placeholder="Correo" name ="correo" required="">
                    <input type="password" placeholder="Contraseña" name="contrasena1"  required="" id ="C1">
                    <input type="password" placeholder="Confirmar contraseña" name ="contrasena2"  required="" id ="C2">
                    <button class="btn btn-primary">Registrarse</button> <a href="index.php" class="btn btn-primary my-2">Regresar</a> 
                </form>
            </div>
        </div>

    </main>
    <script src ="Librerias/jquery-3.4.1.min.js"></script>
    <script src="assets/js/script.js"></script>  
    <script src="Librerias/sweetalert.min.js"></script>
    <script type="text/javascript">
            function login(){
               $.ajax({
                   type: "POST",
                   data: $('#frmLogin').serialize(),
                   url: "Procesos/Usuarios/Login/login.php",
                   success:function(respuesta){
                    respuesta = respuesta.trim();
                    if (respuesta == 1){
                        window.location ="sesion.php";
                    }else{
                        swal("Error ","Contraseña o usuario incorrectos");
                        }
                    }
               });
               return false ; 
            }
    </script>
    <script type="text/javascript">
        function agregarUsuarioNuevo() { 
            var valor1 = document.getElementById("C1").value;
            var valor2 = document.getElementById("C2").value; 
            if (valor1 != valor2){
                $("#frmRegistro")[0].reset(); 
                alert("Las contraseñas no coinciden");
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
    </script>  

</body>
</html>