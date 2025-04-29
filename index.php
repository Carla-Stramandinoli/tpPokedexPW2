<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Pokedex</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Pokedex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex" method="get">
            <input class="form-control me-2" type="search" name="search" placeholder="Buscar pokemon"
                   aria-label="Search">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
        <div>
            <form class="row g-1"
                  method="post"
                  action="loguearUsuario.php">
                <div class="col-auto input-group-sm">
                    <input type="email" class="form-control " name="emailUsuario" id="floatingInput"
                           placeholder="name@ejemplo.com" required>
                </div>
                <div class="col-auto input-group-sm">
                    <input type="password" class="form-control" name="passwordUsuario" id="floatingPassword"
                           placeholder="Contraseña" required>
                </div>
                <div class="col-auto">
                    <button class="w-100 btn btn-outline-dark btn-sm" type="submit">Loguearse</button>
                </div>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class='row'>
    <?php
    include "session.php";
    ?>
    </div>
</div>
<?php
if (isset($_GET['error']) && $_GET['error'] == 'existe') {
    echo "
    <div id='alerta' class='alert alert-danger' role='alert'>
        El Pokémon o número que intentas agregar ya existe.
    </div>
    <script>
        setTimeout(function() {
            let alerta = document.getElementById('alerta');
            if (alerta) {
                alerta.style.display = 'none';
            }
        }, 3000); // Oculta la alerta después de 5 segundos
    </script>
    ";
}
?>

<div class="table-responsive">
    <table class="table table-sm table-striped-columns">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Tipo1</th>
            <th scope="col">Grupo</th>
            <th scope="col" class="text-center">Descripción</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "conexion.php";
        ?>
        </tbody>
    </table>



    <?php
    if($_SESSION != null){
       echo "<button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#canvasFormNuevoPokemon' aria-controls='offcanvasRight'>Nuevo pokemon</button>";

        include "nuevoPokemonIndex.php";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
</body>
</html>
