<?php

require_once 'ConexionModelo.php';

class SesionModelo{

    public static function mld_sesion($correo , $password){

        $conexion = Conexion::conectar();
        $iniciar = $conexion->prepare("SELECT * FROM usuario WHERE correo = :correo AND password = :password");
        
        $iniciar -> bindParam(':correo' , $correo , PDO::PARAM_STR);
        $iniciar -> bindParam(':password' , $password , PDO::PARAM_STR);
        $iniciar -> execute();
        return $iniciar ->fetch();
    }

    public static function mdl_usuarioCrear($datos){
        $conexion = Conexion::conectar();
        $crear = $conexion->prepare("INSERT INTO usuario (idUsuario, nombre, apellido, correo, password) VALUES (NULL, :nombre, :apellido, :correo, :password)");
        $crear -> bindParam(':nombre' , $datos['nombre'] , PDO::PARAM_STR);
        $crear -> bindParam(':apellido' , $datos['apellido'] , PDO::PARAM_STR);
        $crear -> bindParam(':correo' , $datos['correo'] , PDO::PARAM_STR);
        $crear -> bindParam(':password' , $datos['password'] , PDO::PARAM_INT);

        if($crear -> execute()){
            return 'ok';
        }else{
            return 'error';
        }

    }    
} 
