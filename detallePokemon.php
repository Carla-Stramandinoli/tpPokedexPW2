<?php
require_once("MiBaseDeDatos.php");

$DataBase = new MyBaseDeDatos();

$nombre = isset($_GET['search']) ? $_GET['search'] : '';

$safeSearch = $DataBase->escape($nombre);

$queryPokemon = "SELECT * FROM Pokemones WHERE Nombre LIKE '%" . $safeSearch ."%'";
$consultaPokemon = $DataBase->doQuery($queryPokemon);

if(mysqli_num_rows($consultaPokemon) > 0){
    $detallePokemon = mysqli_fetch_assoc($consultaPokemon);
    echo "<div class='card m-5 d-flex justify-content-center bg-warning bg-opacity-50' style='max-width: 800px;'>
<h3 class='text-center mt-1'>". $detallePokemon["Nombre"] ."</h3>
  <div class='row g-0'>
    <div class='col-md-4 d-flex align-items-center'>
      <img src='imagenes/" . $detallePokemon["Imagen"] . "' alt='" . $detallePokemon["Nombre"] . "' class='img-fluid' width='300'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <p class='card-text'>". $detallePokemon["Descripcion"] ."</p>
        <div class='d-flex justify-content-around align-items-center'>
        <img src='imagenes/tipo-grupo/" . $detallePokemon["Tipo"] . "' alt='" . $detallePokemon["Tipo"] . "' class='img-fluid' width='100'>
        <img src='imagenes/tipo-grupo/" . $detallePokemon["Grupo"] . "' alt='" . $detallePokemon["Grupo"] . "' class='img-fluid' width='100'>
        </div>     
    </div>
    </div>
  </div>
</div>";
}