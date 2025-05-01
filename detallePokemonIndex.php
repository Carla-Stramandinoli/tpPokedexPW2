<?php
require_once("headIndex.php");
?>
<body class="bg-warning bg-opacity-10">
<nav class="navbar navbar-expand-lg bg-warning bg-opacity-50">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Pokedex</a>
        <form method='post' class='mb-0'>
            <button class='w-100 btn btn-outline-dark btn-sm' name='volver' type='submit'>Volver</button>
        </form>
        <?php
        $btnVolver = $_POST["volver"];
        if(isset($btnVolver)){
            header("Location: index.php");
        }
        ?>
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
