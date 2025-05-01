<?php
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);


$numero = $_POST["numeroNuevoPokemon"];
$nombre = $_POST["nombreNuevoPokemon"];
$imagen = $_FILES["imagenNuevoPokemon"]["name"];
$tipo1 = $_POST["tipoNuevoPokemon"];
$grupo = $_POST["grupoNuevoPokemon"];
$descripcion = $_POST["descripcionNuevoPokemon"];

$rutaTemporal = $_FILES['imagenNuevoPokemon']['tmp_name'];
$rutaDestino = "imagenes/" . $imagen;

move_uploaded_file($rutaTemporal, $rutaDestino);
$tipoConExtension = $tipo1 . ".png";
$grupoConExtension = $grupo . ".png";

//consulta para ver si ya existe uno con el mismo nombre o identificador
$queryPokemonExistente = "SELECT * FROM Pokemones WHERE Nombre = '$nombre' OR identificador = '$numero'";
$consultaPokemonExistente = mysqli_query($conexion, $queryPokemonExistente);
$nfila = mysqli_num_rows($consultaPokemonExistente);
if ($nfila > 0) {
    header("location: index.php?error=existe");
    exit();
} else {
    $queryNuevoPokemon = "INSERT INTO Pokemones (identificador, Nombre, Imagen, Tipo, Grupo, Descripcion) 
VALUES ('$numero', '$nombre', '$imagen', '$tipoConExtension', '$grupoConExtension', '$descripcion')";
    $consultaNuevoPokemon = mysqli_query($conexion, $queryNuevoPokemon);
    if ($consultaNuevoPokemon) {
        header("location: index.php");
    }
}


// http://localhost/tpPokedex/nuevoPokemon.php?DEBUG=true
//if($_GET["DEBUG"]){
//    var_dump($queryNuevoPokemon);
//}


