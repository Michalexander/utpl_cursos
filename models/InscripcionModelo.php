<?php

require_once 'ConexionModelo.php';

class InscripcionModelo{


    public static function mdl_inscripcionCrear($datos){
        $conexion = Conexion::conectar();
        $crear = $conexion->prepare("INSERT INTO inscripcion (inscripcionId, nombres, email, ciudad, cursoId , usu_id) 
        VALUES (NULL, :nombres, :email, :ciudad, :cursoId,  :usu_id)");
        $crear -> bindParam(':nombres' , $datos['nombre'] , PDO::PARAM_STR);
        $crear -> bindParam(':email' , $datos['email'] , PDO::PARAM_STR);
        $crear -> bindParam(':ciudad' , $datos['ciudad'] , PDO::PARAM_STR);
        $crear -> bindParam(':cursoId' , $datos['curso'] , PDO::PARAM_INT);
        $crear -> bindParam(':usu_id' , $datos['id'] , PDO::PARAM_INT);

        if($crear -> execute()){
            return 'ok';
        }else{
            return 'error';
        }
    }

    public static function mdl_mostrarInscritos(){
        $conexion = Conexion::conectar();

        $mostrar = $conexion->prepare("SELECT * FROM inscripcion");
        $mostrar -> execute();
        return $mostrar -> fetchAll();
    }

    
    
}