<?php

require_once 'ConexionModelo.php';

class CursoModelo{

    public static function mdl_mostrarCursos(){
        $conexion = Conexion::conectar();

        $mostrar = $conexion->prepare("SELECT * FROM curso");
        $mostrar -> execute();
        return $mostrar -> fetchAll();
    }

    public static function mdl_cursoCrear($datos){
        $conexion = Conexion::conectar();
        $crear = $conexion->prepare("INSERT INTO curso (cursoId, nombre, imagen_url) VALUES (NULL, :nombre, :imagen_url)");
        $crear -> bindParam(':nombre' , $datos['nombre'] , PDO::PARAM_STR);
        $crear -> bindParam(':imagen_url' , $datos['imagen_url'] , PDO::PARAM_STR);

        if($crear -> execute()){
            return 'ok';
        }else{
            return 'error';
        }
    }

    public static function mdl_mostrarCursoId($id){
        $conexion = Conexion::conectar();

        $mostrar = $conexion->prepare("SELECT * FROM curso WHERE cursoId = :cursoId");
        $mostrar -> bindParam(':cursoId' , $id , PDO::PARAM_INT);
        $mostrar -> execute();
        return $mostrar -> fetch();
    }

}