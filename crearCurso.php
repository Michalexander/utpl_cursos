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
    <h2 class="header__titulo--paginas">CREAR CURSO</h2>

    <main class="formulario__agregar">
        <div class="container">
            <form class="row g-3" method="post">
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="validationDefault01" name="nombre" placeholder="Ingresar Nombre" required>
                </div>
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Imagen Url</label>
                    <input type="text" class="form-control" id="validationDefault01" name="imagenUrl" placeholder="Ingresar imagen" required>
                </div>
                
               
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Inscribirte al Curso</button>
                </div>
                <?php 
                require_once 'controller/CursoControlador.php';
                require_once 'models/CursoModelo.php';
                        
                $crear = new CursoControlador();
                $crear -> ctr_cursoCrear();
                ?>
            </form>
        </div>
    </main>
</body>

</html>