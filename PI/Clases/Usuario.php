<?php 
    require_once "Conexion.php";
    class Usuario extends Conectar{

        public function agregarUsuario($datos){
            $conexion = Conectar::conexion();
            if(self::buscarUsuarioRepetido($datos['usuario'])){
                return 2;
            }else{
                $sql = "INSERT INTO user(
                                        usuario,
                                        nombres,
                                        apellidos,
                                        pass,
                                        id_cargo)
                                Value (?, ?, ?, ?,?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ssssi', $datos['usuario'],
                                           $datos['nombre'],
                                           $datos['apellido'],
                                           $datos['password'],
                                           $datos['idCargo']);

                $exito = $query->execute();
                $query->close();
                return $exito;
            }
        }
        public function buscarUsuarioRepetido($usuario){
            $conexion = Conectar::conexion();

            $sql="SELECT usuario 
                FROM user 
                WHERE usuario = '$usuario'";
            $result = mysqli_query ($conexion, $sql);
            $datos = mysqli_fetch_array($result);

            if (isset( $datos['usuario']) != "" || isset($datos['usuario']) == $usuario){
                return 1;
            }else{
                return 0; 
            }
        }
   

        public function login($usuario, $password){
            $conexion = Conectar::conexion();
            $sql ="SELECT count(*) as existeUsuario
                             FROM user 
                            WHERE usuario ='$usuario' 
                            AND pass ='$password'";
            $result = mysqli_query($conexion, $sql);

            $repuesta = mysqli_fetch_array($result)['existeUsuario'];
            if ($repuesta>0){
                $_SESSION['usuario'] = $usuario;
                
                $sql = "SELECT id_usuario , id_cargo FROM user 
                                WHERE usuario ='$usuario' 
                                AND pass ='$password'"; 
                $resulta = mysqli_query($conexion,$sql);
                $array = mysqli_fetch_row($resulta);
                $idUsuario = $array[0];
                $idcargo = $array[1];
                $_SESSION['id_usuario'] = $idUsuario;

                if($idcargo == 0){
                    return 1;
                }else if ($idcargo == 1){
                   return 3;
                }    
    
                
            }else{
                return 0;
            }
        }
    }


?>