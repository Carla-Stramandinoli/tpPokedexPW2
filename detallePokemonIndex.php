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
        <a class="navbar-brand" href="#">Pokedex</a>
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
    <?php
    include("detallePokemon.php");
    ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
</body>
</html>
