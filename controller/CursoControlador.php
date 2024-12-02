<?php


class CursoControlador{

    public static function ctr_cursoCrear(){
        if(isset($_POST['nombre']) || isset($_POST['imagenUrl']) ){
            $nombre = $_POST['nombre'];
            $imagen_url = $_POST['imagenUrl'];
            

            if(!empty($nombre) && !empty($imagen_url)){

                $datos = array(
                    'nombre' => $nombre,
                    'imagen_url' => $imagen_url
                );

                $resultado = CursoModelo::mdl_cursoCrear($datos);

                if($resultado == 'ok'){
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Correcto!</strong> Curso creado.
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