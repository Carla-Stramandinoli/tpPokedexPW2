<?php
session_start();
if ($_SESSION != null) {
    echo " 
            <div class='col'>
            <p> Bienvenido/a: " . $_SESSION['emailUsuario'] . "</p>
            </div>
            <div class='col text-end'>
                <form method='post'>
                <button class='w-50 btn btn-outline-dark btn-sm' name='cerrarSesion' type='submit'>Cerrar sesión</button>
            </form>
            </div>
            ";
}
if (isset($_POST["cerrarSesion"])) {
    session_destroy();
    header("location: index.php");
    exit();
}