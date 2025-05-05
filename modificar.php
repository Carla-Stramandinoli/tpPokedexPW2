<?php
require_once ("headIndex.php");
require_once("MiBaseDeDatos.php");

$DataBase = new MyBaseDeDatos();
$conexion = $DataBase->getConexion();

$id_autoincremental = isset($_GET["id_autoincremental"]) ? intval($_GET["id_autoincremental"]) : null;


// Mostrar el formulario solo si el ID existe
if ($id_autoincremental !== null) {
    $queryBuscarId = "SELECT * FROM Pokemones WHERE id_autoincremental = $id_autoincremental";
    $consultaBuscarId = $DataBase->doQuery($queryBuscarId);
    $row = mysqli_fetch_array($consultaBuscarId);

// Procesar modificación si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $numero = isset($_POST["numeroNuevoPokemon"]) && $_POST["numeroNuevoPokemon"] !== ""
            ? $_POST["numeroNuevoPokemon"] : $row["identificador"];
        $nombre = isset($_POST["nombreNuevoPokemon"]) && $_POST["nombreNuevoPokemon"] !== ""
            ? $_POST["nombreNuevoPokemon"] : $row["Nombre"];
        $tipo1 = isset($_POST["tipoNuevoPokemon"]) && $_POST["tipoNuevoPokemon"] !== ""
            ? $_POST["tipoNuevoPokemon"] : $row["Tipo"];
        $grupo = isset($_POST["grupoNuevoPokemon"]) && $_POST["grupoNuevoPokemon"] !== ""
            ? $_POST["grupoNuevoPokemon"] : $row["Grupo"];
        $descripcion = isset($_POST["descripcionNuevoPokemon"]) && $_POST["descripcionNuevoPokemon"] !== ""
            ? $_POST["descripcionNuevoPokemon"] : $row["Descripcion"];

        // Imagen
        $imagen = $_FILES["imagenNuevoPokemon"]["name"];
        $rutaTemporal = $_FILES["imagenNuevoPokemon"]["tmp_name"];

        // agrego extension
        $tipoSinExtension = pathinfo($tipo1, PATHINFO_FILENAME);
        $grupoSinExtension = pathinfo($grupo, PATHINFO_FILENAME);

        $tipoConExtension = $tipoSinExtension . ".png";
        $grupoConExtension = $grupoSinExtension . ".png";

        if (!empty($imagen)) {
            // Subió imagen nueva
            $nombreImagen = basename($imagen);
            $rutaDestino = "imagenes/" . $nombreImagen;

            move_uploaded_file($rutaTemporal, $rutaDestino);

            $queryUpdatePokemon = "UPDATE Pokemones SET identificador = ?, Nombre = ?, Imagen = ?, Tipo = ?, Grupo = ?, Descripcion = ? WHERE id_autoincremental = ?";
            $stmt = mysqli_prepare($conexion, $queryUpdatePokemon);
            mysqli_stmt_bind_param($stmt, "ssssssi", $numero, $nombre, $nombreImagen, $tipoConExtension, $grupoConExtension, $descripcion, $id_autoincremental);
        } else {
            // No subió imagen nueva
            $queryUpdatePokemon = "UPDATE Pokemones SET identificador = ?, Nombre = ?, Tipo = ?, Grupo = ?, Descripcion = ? WHERE id_autoincremental = ?";
            $stmt = mysqli_prepare($conexion, $queryUpdatePokemon);
            mysqli_stmt_bind_param($stmt, "sssssi", $numero, $nombre, $tipoConExtension, $grupoConExtension, $descripcion, $id_autoincremental);
        }

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al actualizar.";
        }
        mysqli_stmt_close($stmt);
    }

    if ($row) {
        echo "<body class='d-flex justify-content-center align-items-center min-vh-50 bg-warning bg-opacity-10'>
<div class='card p-4 shadow-sm p-3 m-5 bg-body rounded' style='max-width: 540px; width: 100%;'>
    <h1 class='h3 mb-3 fw-normal text-center'>Modificar pokemon</h1>
    <form method='post' enctype='multipart/form-data' action='modificar.php?id_autoincremental=" . $id_autoincremental . "'>
            <div class='mb-3'>
                <label class='form-label'>Numero</label>
                <input type='text' class='form-control' name='numeroNuevoPokemon' placeholder='" . htmlspecialchars($row["identificador"]) . "'>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nombre</label>
                <input type='text' class='form-control' name='nombreNuevoPokemon' placeholder='" . htmlspecialchars($row["Nombre"]) . "'>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Imagen</label>
                <input type='file' class='form-control' name='imagenNuevoPokemon'>
            </div>
            <div class='mb-3'>
                <select class='form-select' name='tipoNuevoPokemon'>
                    <option selected> " . htmlspecialchars(pathinfo($row["Tipo"], PATHINFO_FILENAME)) . "</option>
                    <option value='planta'>Planta</option>
                    <option value='veneno'>Veneno</option>
                    <option value='fuego'>Fuego</option>
                    <option value='agua'>Agua</option>
                    <option value='electrico'>Electrico</option>
                    <option value='volador'>Volador</option>
                    <option value='psiquico'>Psiquico</option>
                </select>
            </div>
            <div class='mb-3'>
                <select class='form-select' name='grupoNuevoPokemon'>
                    <option selected> " . htmlspecialchars(pathinfo($row["Grupo"], PATHINFO_FILENAME)) . "</option>
                      <option value='bicho'>Bicho</option>
                    <option value='fantasma'>Fantasma</option>
                    <option value='tierra'>Tierra</option>
                    <option value='bicho'>Bicho</option>
                </select>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Descripción</label>
                <input type='text' class='form-control' name='descripcionNuevoPokemon' placeholder='" . htmlspecialchars($row["Descripcion"]) . "'>
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
