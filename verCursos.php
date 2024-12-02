<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="header__contenedor">
            <h1 class="header__titulo">Bienvenido a <span class="header__titulo--modificador">UTPL</span> Cayambe</h1>
        </div>
    </header>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container d-flex justify-content-center align-items-center">
            <a class="nav-link text-light active mx-3" href="bienvenido.php">INICIO</a>
            <a class="nav-link text-light active mx-3" href="crearCurso.php">CREAR CURSO</a>
            <a class="nav-link text-light active mx-3" href="verCursos.php">VER CURSOS</a>
            <a class="nav-link text-light active mx-3" href="verInscritos.php">VER INSCRIPTOS</a>
            <a class="nav-link text-light active mx-3" href="salir.php">SALIR</a>
        </div>
    </nav>


    <main class="formulario__agregar">
        <div class="container">

            <?php
            require_once 'models/CursoModelo.php';

            $resultado = CursoModelo::mdl_mostrarCursos();
            foreach($resultado as $curso){
                echo '
                <div class="card" style="width: 18rem;">
                <img src="'.$curso['imagen_url'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"> <strong>"'.$curso['nombre'].'"</strong></p>
                    </div>
                </div>
                
                
                ' ;
            }            
            ?>
            
        </div>
    </main>
</body>

</html>