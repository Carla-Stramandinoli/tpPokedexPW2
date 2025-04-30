<?php
include "headIndex.php";
?>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-warning bg-opacity-10">
<div class='card p-4 shadow-sm p-3 mb-5 bg-body rounded' style='max-width: 540px; width: 100%;'>
    <div style="
        background-image: url('./imagenes/pokebola.png');
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;">
    </div>
    <form method="post"
          action="registrarUsuario.php"
          class="text-center">
            <h1 class="h3 mb-3 fw-normal">Registrarse</h1>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" name="emailUsuario" id="floatingInput" placeholder="name@ejemplo.com" required>
                <label for="floatingInput">Email:</label>
           </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" name="passwordUsuario" id="floatingPassword" placeholder="Contraseña" required>
                <label for="floatingInput">Contraseña:</label>
            </div>
            <button class="w-100 btn  btn-warning text-white" type="submit">Registrarse</button>
        <p class="m-2 text-secondary">Para ingresar debes estar registrado.</p>
        <p class="m-3 text-secondary">© Pokedex - 2025</p>
        </form>
</body>
</html>