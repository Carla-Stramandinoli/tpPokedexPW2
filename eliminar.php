<?php
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);

$id_autoincremental = isset($_GET["id_autoincremental"]) ? intval($_GET["id_autoincremental"]) : 0;

if ($id_autoincremental > 0) {
    $queryEliminarSegura = mysqli_prepare($conexion, "DELETE FROM Pokemones WHERE id_autoincremental = ?");
    mysqli_stmt_bind_param($queryEliminarSegura, "i", $id_autoincremental);
    mysqli_stmt_execute($queryEliminarSegura);

    if (mysqli_stmt_affected_rows($queryEliminarSegura) > 0) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al eliminar el Pokémon.";
    }
    mysqli_stmt_close($queryEliminarSegura);

} else {
    echo "ID inválido.";
}
