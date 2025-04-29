<?php
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);

$nombre = isset($_GET['search']) ? $_GET['search'] : '';

echo "<h2> Nombre recibido: " . htmlspecialchars($nombre) . "</h2>";

$queryPokemon = "SELECT * FROM Pokemones WHERE Nombre LIKE '%" . mysqli_real_escape_string($conexion, $nombre) ."%'";
$consultaPokemon = mysqli_query($conexion, $queryPokemon);

if(mysqli_num_rows($consultaPokemon) > 0){
    $detallePokemon = mysqli_fetch_assoc($consultaPokemon);
    echo "<div class='card mb-3' style='max-width: 540px;'>
  <div class='row g-0'>
    <div class='col-md-4'>
      <img src='" . $detallePokemon["Imagen"] . "class='img-fluid rounded-start' alt='". $detallePokemon["Nombre"] ."'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h5 class='card-title'>". $detallePokemon["Nombre"] ."</h5>
        <p class='card-text'>". $detallePokemon["Descripcion"] ."</p>
        <p class='card-text'><small class='text-muted'>". $detallePokemon["Tipo1"] . " - "  . $detallePokemon["Grupo"] ."</small></p>
      </div>
    </div>
  </div>
</div>";
}


//Codigo a implementar para agregar los botones de modificar y eliminar (deberia ser aca para que sea solo cuando el usuario esta logueado)
//<td><a href='eliminar.php?id_autoincremental=" . $filaACompletar["id_autoincremental"] . "'><button class='btn btn-primary' type='button'>Eliminar</button></a></td>
//<td><a href='eliminar.php?id_autoincremental=" . $filaACompletar["id_autoincremental"] . "'><button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#canvasFormNuevoPokemon' aria-controls='offcanvasRight'>Modificar</button></a></td>