<?php
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);

$nombre = isset($_GET['search']) ? $_GET['search'] : '';

$queryPokemon = "SELECT * FROM Pokemones WHERE Nombre LIKE '%" . mysqli_real_escape_string($conexion, $nombre) ."%'";
$consultaPokemon = mysqli_query($conexion, $queryPokemon);

if(mysqli_num_rows($consultaPokemon) > 0){
    $detallePokemon = mysqli_fetch_assoc($consultaPokemon);
    echo "<div class='card m-5 d-flex justify-content-center bg-warning bg-opacity-50' style='max-width: 540px;'>
  <div class='row g-0'>
    <div class='col-md-4'>
      <img src='imagenes/" . $detallePokemon["Imagen"] . "' alt='" . $detallePokemon["Nombre"] . "' class='img-fluid' width='200'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h5 class='card-title text-center'>". $detallePokemon["Nombre"] ."</h5>
        <p class='card-text'>". $detallePokemon["Descripcion"] ."</p>
        <p class='card-text'><small class='text-muted'>". $detallePokemon["Tipo1"] . " - "  . $detallePokemon["Grupo"] ."</small></p>
      </div>
    </div>
  </div>
</div>";
}