<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Películas | CAC-MOVIES</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="https://kit.fontawesome.com/f7fb471b65.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
<?php include_once('../php/header_admin.php'); ?>
<main id="mainDetalle" class="mainDetalle">
    <section class="container mt-4 mb-6">
        <h1>Gestión de películas</h1>
        <p>En esta sección se podrá llevar a cabo la gestión de las películas del portal</p>
        <!-- Formulario para dar de alta una película nueva-->
        <form id="formNuevaPelicula" action="../php/post_pelicula.php" method="post" enctype="multipart/form-data" class="row row-cols-lg-auto g-4 align-items-center" onsubmit="return validarFormulario()">
        <input type="hidden" name="peliculaId" id="peliculaId">
    <div class="col-12 col-md-6">
        <label for="titulo">Título</label>
        <input class="form-control" type="text" name="titulo" id="titulo" required>
    </div>
    <div class="col-4 col-md-2">
        <label for="lanzamiento">Lanzamiento</label>
        <input class="form-control" type="date" name="lanzamiento" id="lanzamiento" required>
    </div>
    <div class="col-4 col-md-2">
        <label for="genero">Género</label>
        <select class="form-control" id="genero" name="genero" required>
            <option value="">Seleccione...</option>
            <option value="Aventura">Aventura</option>
            <option value="Comedia">Comedia</option>
            <option value="Drama">Drama</option>
            <option value="Acción">Acción</option>
            <option value="Ciencia Ficción">Ciencia Ficción</option>
        </select>
    </div>
    <div class="col-4 col-md-2">
        <label for="duracion">Duración</label>
        <input class="form-control" type="text" name="duracion" id="duracion" required>
    </div>
    <div class="col-12 col-md-4">
        <label for="director">Director</label>
        <input class="form-control" type="text" name="director" id="director" required>
    </div>
    <div class="col-12 col-md-8">
        <label for="reparto">Reparto</label>
        <input class="form-control" type="text" name="reparto" id="reparto" required>
    </div>
    <div class="col-12 col-md-12">
        <label for="sinopsis">Sinopsis</label>
        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3" style="resize: vertical;" required></textarea>
    </div>
    <div class="col-12 col-md-6">
        <label for="imagen">Imagen</label>
        <input class="form-control" type="file" name="imagen" id="imagen" required>
    </div>
    <div class="col-12">
        <input class="align-self-center btn btn-success" type="submit" id="submitBtn" value="Agregar Película">
    </div>
</form>

    </section>
    <hr>
    <!-- Sección para mostrar las películas -->
    <section class="container mt-5 mb-5 overflow-auto">
        <h2>Listado de Películas</h2>
        <p class="small">Para ver todos los datos de las películas, elija una y toque modificar</p>
        <table class="table table-dark table-striped" id="tablePeliculas">
    <thead>
        <tr>
            <th>Título</th>
            <th>Duración</th>
            <th>Género</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="bodyTablePeliculas">
        <!-- Aquí se cargarán las películas desde PHP -->
        <?php include_once '../php/get_peliculas.php'; ?>
    </tbody>
</table>
    </section>
</main>
<?php include_once '../php/footer_admin.php'; ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../js/validacion_formulario.js"></script>
<script src="../js/get_peliculas.js"></script>
<!-- <script src="../js/post_pelicula.js"></script> -->
</body>
</html>


