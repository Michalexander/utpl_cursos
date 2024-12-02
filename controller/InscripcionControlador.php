<?php


class InscripcionControlador{

    public static function ctr_inscripcionCrear(){
        if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['ciudad']) && isset($_POST['curso']) ){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $ciudad = $_POST['ciudad'];
            $curso = $_POST['curso'];
            $id = $_POST['id'];

            if(!empty($nombre) && !empty($nombre) && !empty($nombre) && !empty($nombre) ){

                $datos = array(
                    'nombre' => $nombre,
                    'email' => $email,
                    'ciudad' => $ciudad,
                    'curso' => $curso,
                    'id' => $id
                );

                $resultado = InscripcionModelo::mdl_inscripcionCrear($datos);

                if($resultado == 'ok'){
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Correcto!</strong> Estas inscripto en el curso.
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