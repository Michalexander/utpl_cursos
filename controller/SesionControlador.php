<?php


class SesionControlador{


    public static function ctr_sesion(){

       
        if(isset($_POST['correo']) || isset($_POST['password']) ){
            
            $correo = trim($_POST['correo']);
            $password = trim($_POST['password']);


            if(!empty($correo) && !empty($password)){

                $respuesta = SesionModelo::mld_sesion($correo , $password);

                if(is_array($respuesta) && count($respuesta) > 0){
                    session_start();
                    $_SESSION['nombre'] = $respuesta['nombre'];
                    $_SESSION['apellido'] = $respuesta['apellido'];
                    $_SESSION['correo'] = $respuesta['correo'];
                    $_SESSION['id'] = $respuesta['idUsuario'];

                    header("Location: bienvenido.php");
                    exit;
                }else{
                    echo '
                    </br></br></br>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Acceso Denegado!</strong> Credenciales incorrectas.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                }

            }else{
                echo '
                    </br></br></br>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Los campos estan vacios.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
            }

        }
    }

    public static function ctr_crearCuenta(){
        if(isset($_POST['nombre']) || isset($_POST['apellido']) || isset($_POST['correo']) || isset($_POST['password']) ){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            if(!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($password) ){

                $datos = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                    'password' => $password
                );

                $resultado = SesionModelo::mdl_usuarioCrear($datos);

                if($resultado == 'ok'){
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Correcto!</strong> Cuenta Creada Correctamente.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                    
                }else{
                    echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> ocurrio un error.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                }
            }else{
                echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> los campos deben estar llenos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
            }
        }
    }

}