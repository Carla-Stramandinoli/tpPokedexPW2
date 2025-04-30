<?php
include "headIndex.php";

$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);

$id_autoincremental = isset($_GET["id_autoincremental"]) ? intval($_GET["id_autoincremental"]) : null;

// Procesar modificación si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && $id_autoincremental !== null) {
    $numero = $_POST["numeroNuevoPokemon"];
    $nombre = $_POST["nombreNuevoPokemon"];
    $tipo1 = $_POST["tipoNuevoPokemon"];
    $grupo = $_POST["grupoNuevoPokemon"];
    $descripcion = $_POST["descripcionNuevoPokemon"];

    // Imagen
    $imagen = $_FILES["imagenNuevoPokemon"]["name"];
    $rutaTemporal = $_FILES["imagenNuevoPokemon"]["tmp_name"];

    if (!empty($imagen)) {
        // Subió imagen nueva
        $nombreImagen = basename($imagen);
        $rutaDestino = "imagenes/" . $nombreImagen;

        move_uploaded_file($rutaTemporal, $rutaDestino);

        $queryUpdate = "UPDATE Pokemones SET identificador = ?, Nombre = ?, Imagen = ?, Tipo1 = ?, Grupo = ?, Descripcion = ? WHERE id_autoincremental = ?";
        $stmt = mysqli_prepare($conexion, $queryUpdate);
        mysqli_stmt_bind_param($stmt, "ssssssi", $numero, $nombre, $nombreImagen, $tipo1, $grupo, $descripcion, $id_autoincremental);
    } else {
        // No subió imagen nueva
        $queryUpdate = "UPDATE Pokemones SET identificador = ?, Nombre = ?, Tipo1 = ?, Grupo = ?, Descripcion = ? WHERE id_autoincremental = ?";
        $stmt = mysqli_prepare($conexion, $queryUpdate);
        mysqli_stmt_bind_param($stmt, "sssssi", $numero, $nombre, $tipo1, $grupo, $descripcion, $id_autoincremental);
    }

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar.";
    }
    mysqli_stmt_close($stmt);
}

// Mostrar el formulario solo si el ID existe
if ($id_autoincremental !== null) {
    $queryBuscarId = "SELECT * FROM Pokemones WHERE id_autoincremental = $id_autoincremental";
    $consultaBuscarId = mysqli_query($conexion, $queryBuscarId);
    $row = mysqli_fetch_array($consultaBuscarId);

    if ($row) {
        echo "<body class='d-flex justify-content-center align-items-center min-vh-50 bg-warning bg-opacity-10'>
<div class='card p-4 shadow-sm p-3 m-5 bg-body rounded' style='max-width: 540px; width: 100%;'>
    <h1 class='h3 mb-3 fw-normal text-center'>Modificar pokemon</h1>
    <form method='post' enctype='multipart/form-data' action='modificar.php?id_autoincremental=" . $id_autoincremental . "'>
            <div class='mb-3'>
                <label class='form-label'>Numero</label>
                <input required type='text' class='form-control' name='numeroNuevoPokemon' value='" . htmlspecialchars($row["identificador"]) . "'>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nombre</label>
                <input required type='text' class='form-control' name='nombreNuevoPokemon' value='" . htmlspecialchars($row["Nombre"]) . "'>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Imagen</label>
                <input type='file' class='form-control' name='imagenNuevoPokemon'>
            </div>
            <div class='mb-3'>
                <select class='form-select' name='tipoNuevoPokemon'>
                    <option selected>" . htmlspecialchars($row["Tipo1"]) . "</option>
                    <option value='planta'>Planta</option>
                    <option value='veneno'>Veneno</option>
                    <option value='fuego'>Fuego</option>
                    <option value='agua'>Agua</option>
                    <option value='tierra'>Tierra</option>
                    <option value='electrico'>Electrico</option>
                </select>
            </div>
            <div class='mb-3'>
                <select class='form-select' name='grupoNuevoPokemon'>
                    <option selected>" . htmlspecialchars($row["Grupo"]) . "</option>
                    <option value='monstruo'>Monstruo</option>
                    <option value='acero'>Acero</option>
                    <option value='siniestro'>Siniestro</option>
                    <option value='volador'>Volador</option>
                </select>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Descripción</label>
                <input type='text' class='form-control' name='descripcionNuevoPokemon' value='" . htmlspecialchars($row["Descripcion"]) . "'>
            </div>
            <div class='col-auto'>
                <button class='w-100 btn btn-outline-warning btn-sm' type='submit'>Modificar</button>
            </div>
    </form>
</div>
</body>
        ";
    } else {
        echo "No se encontró el Pokémon con ese ID.";
    }
}
