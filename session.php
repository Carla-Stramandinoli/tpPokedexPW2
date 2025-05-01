<?php
session_start();
if ($_SESSION != null) {
    echo " 
            <div class='d-flex justify-content-between align-items-center bg-warning-subtle p-2 rounded'>     
            <p class='mb-0 p-2'> Bienvenido/a: " . $_SESSION['emailUsuario'] . "</p>
                <form method='post' class='mb-0'>
                <button class='w-100 btn btn-outline-dark btn-sm' name='cerrarSesion' type='submit'>Cerrar sesión</button>
                </form>
            </div>";
} else {
    echo " <div >
            <form class='row g-1'
                  method='post'
                  action='loguearUsuario.php'>
                <div class='col-auto input-group-sm'>
                    <input type='email' class='form-control' name='emailUsuario' id='floatingInput'
                           placeholder='name@ejemplo.com' required>
                </div>
                <div class='col-auto input-group-sm'>
                    <input type='password' class='form-control' name='passwordUsuario' id='floatingPassword'
                           placeholder='Contraseña' required>
                </div>
                <div class='col-auto'>
                    <button class='w-100 btn btn-outline-dark btn-sm' type='submit'>Loguearse</button>
                </div>
            </form>
        </div>";
}
if (isset($_POST["cerrarSesion"])) {
    session_destroy();
    header("location: index.php");
    exit();
}