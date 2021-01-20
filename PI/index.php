<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
                    <input type="text" placeholder="Usuario" name = "userName" required="" id="Nombre">
                    <input type="password" placeholder="Contraseña" name ="contrasena" required="" id="Contrasena">
                    <button class="btn btn-primary"> Entrar </button>
                </form>
                <!--Registro-->
                <form id ="frmRegistro" method ="POST" class="formulario__register" onsubmit ="return agregarUsuarioNuevo()" >
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Usuario" name ="usuario" required="">
                    <input type="text" placeholder="Nombres" name ="nombre" required="">
                    <input type="text" placeholder="Apellidos" name ="apellido" required="">
                    <input type="password" placeholder="Contraseña" name="contrasena1"  required="" id ="C1">
                    <input type="password" placeholder="Confirmar contraseña" name ="contrasena2"  required="" id ="C2">
                    <button class="btn btn-primary">Registrarse</button>
                </form>
            </div>
        </div>

    </main>
    <script src ="Librerias/jquery-3.4.1.min.js"></script>
    <script src="assets/js/script.js"></script>  
    <script src="Librerias/sweetalert.min.js"></script>
    <script src="js/login_register.js"></script>

</body>
</html>