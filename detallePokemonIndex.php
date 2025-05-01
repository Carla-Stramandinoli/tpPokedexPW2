<?php
require_once("headIndex.php");
?>
<body class="bg-warning bg-opacity-10">
<nav class="navbar navbar-expand-lg bg-warning bg-opacity-50">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Pokedex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
