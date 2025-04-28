

<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasFormNuevoPokemon" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Agregar nuevo pokemon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form method="post" action="nuevoPokemon.php">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Numero</label>
                <input required type="text" class="form-control" name="numeroNuevoPokemon" id="numeroNuevoPokemon" placeholder="070 (continuar con ultimo de la tabla)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input required type="text" class="form-control" name="nombreNuevoPokemon" id="nombreNuevoPokemon" placeholder="Charmander">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Imagen</label>
                <input type="text" class="form-control" name="imagenNuevoPokemon" id="imagenNuevoPokemon" placeholder="URL a la imagen">
            </div>
            <div class="mb-3">
                <select class="form-select" name="tipoNuevoPokemon" aria-label="Default select example">
                    <option selected>Tipo - Seleccionar 1</option>
                    <option value="planta">Planta</option>
                    <option value="veneno">Veneno</option>
                    <option value="fuego">Fuego</option>
                    <option value="agua">Agua</option>
                    <option value="volador">Volador</option>
                    <option value="tierra">Tierra</option>
                    <option value="electrico">Electrico</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="grupoNuevoPokemon" aria-label="Default select example">
                    <option selected>Grupo - Seleccionar 1</option>
                    <option value="monstruo">Monstruo</option>
                    <option value="fuego">Fuego</option>
                    <option value="agua">Agua</option>
                    <option value="volador">Volador</option>
                    <option value="tierra">Tierra</option>
                    <option value="bicho">Bicho</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcionNuevoPokemon" id="descripcionNuevoPokemon" placeholder="Descripción">
            </div>
            <div class="col-auto">
                <button class="w-100 btn btn-outline-warning btn-sm" type="submit">Agregar</button>
            </div>
        </form>
    </div>
</div>
