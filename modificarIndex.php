<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasFormModificarPokemon" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Agregar nuevo pokemon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form method="post"
              action="modificar.php"
              enctype="multipart/form-data">
            <?php
            include 'modificar.php';
            ?>
        </form>
    </div>
</div>
