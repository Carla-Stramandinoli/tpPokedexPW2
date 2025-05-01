<?php
require_once("headIndex.php");
?>
<body class="bg-warning bg-opacity-10">
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid bg-warning bg-opacity-50">
        <a class="navbar-brand" href="index.php">Pokedex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex" method="get">
            <input class="form-control me-2" type="search" name="search" placeholder="Buscar pokemon"
                   aria-label="Search">
            <button class="w-100 btn btn-outline-dark btn-sm" type="submit">Buscar</button>
        </form>
        <?php
        include "session.php";
        ?>
    </div>
</nav>

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

<div class="contenedor-tabla">
    <div class="fondoPokebola"></div>
    <table class="table table-sm table-striped-columns">
        <thead class="bg-warning bg-opacity-50">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Tipo1</th>
            <th scope="col">Grupo</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "conexion.php";
        ?>
        </tbody>
    </table>
<div class="text-end" >
    <?php
    if ($_SESSION != null) {
        echo "<button class='btn align-self-end nuevoPokemon' type='button' data-bs-toggle='offcanvas' data-bs-target='#canvasFormNuevoPokemon' aria-controls='offcanvasRight'>Nuevo pokemon</button>";
        include "nuevoPokemonIndex.php";
    }
    ?>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
</body>
</html>