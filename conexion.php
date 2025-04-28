<?php
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$queryAllPokemonSql = "SELECT * FROM Pokemones";
$consultaAllPokemons = mysqli_query($conexion, $queryAllPokemonSql);
$nfila = mysqli_num_rows($consultaAllPokemons);

function llenarTabla($consulta)
{
    while ($filaACompletar = mysqli_fetch_assoc($consulta)) {
        echo "<tr scope='row'>
        <td>" . $filaACompletar["identificador"] . "</td>
        <td>" . $filaACompletar["Nombre"] . "</td>
        <td>" . $filaACompletar["Tipo1"] . "</td>
        <td>" . $filaACompletar["Tipo2"] . "</td>
        <td>" . $filaACompletar["Grupo"] . "</td>
        <td>" . $filaACompletar["Descripcion"] . "</td>
        </tr>";
    }
}

//  <td><img src='" . $filaACompletar["Imagen"] . "' alt='" . $filaACompletar["Nombre"] . "' class='img-fluid' width='50'></td>
$search = isset($_GET["search"]) ? $_GET["search"] : '';

if (!empty($search)) {
    $querySearchSql = "SELECT * FROM Pokemones WHERE Nombre LIKE '%" . mysqli_real_escape_string($conexion, $search) . "%'";
    $consultaSearch = mysqli_query($conexion, $querySearchSql);
    $fila = mysqli_num_rows($consultaSearch);
    if ($fila > 0) {
        header("location: detallePokemonIndex.php?search=" . urlencode($search));
    } else {
        echo "<p>Pokemon no encontrado</p>";
        header("refresh: 3; location: index.php"); // vuelvo a recargar la pagina despues de tres segundos para mostrar toda la tabla
    }
} else {
    llenarTabla($consultaAllPokemons);
}



