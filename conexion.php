<?php
session_start();

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
        <td><img src='imagenes/" . $filaACompletar["Imagen"] . "' alt='" . $filaACompletar["Nombre"] . "' class='img-fluid' width='50'></td>
        <td>" . $filaACompletar["Tipo1"] . "</td>
        <td>" . $filaACompletar["Grupo"] . "</td>
        <td>" . $filaACompletar["Descripcion"] . "</td>";
        if ($_SESSION != null) {
            echo
                "<td><a href='eliminar.php?id_autoincremental=" . $filaACompletar["id_autoincremental"] . "'>
                     <button class='boton-eliminar' type='button'>Eliminar</button>
                     </a>
                 </td>
                <td><a href='modificarIndex.php?id_autoincremental=" . $filaACompletar["id_autoincremental"] . "'>
                    <button class='boton-modificar' type='button'>Modificar</button>
                    </a>
                </td>";
        }
        echo "</tr>";
    }
}

$search = isset($_GET["search"]) ? $_GET["search"] : '';

if (!empty($search)) {
    $querySearchSql = "SELECT * FROM Pokemones WHERE Nombre LIKE '%" . mysqli_real_escape_string($conexion, $search) . "%'";
    $consultaSearch = mysqli_query($conexion, $querySearchSql);
    $fila = mysqli_num_rows($consultaSearch);
    if ($fila > 0) {
        header("location: detallePokemonIndex.php?search=" . urlencode($search));
    } else {
        echo "   <div id='alerta' class='alert alert-danger' role='alert'>
        Pokemon no encontrado.
    </div>";
        header("refresh: 3; location: index.php"); // vuelvo a recargar la pagina despues de tres segundos para mostrar toda la tabla
    }
} else {
    llenarTabla($consultaAllPokemons);
}



