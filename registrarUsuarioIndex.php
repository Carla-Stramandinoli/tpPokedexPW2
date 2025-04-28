<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokedex-Registrarse</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<main>
    <div class="container">
        <form method="post"
              action="registrarUsuario.php">
            <h1 class="h3 mb-3 fw-normal">Registrarse</h1>
            <p>Para ingresar debes estar registrado</p>
            <div class="form-floating">
                <input type="email" class="form-control" name="emailUsuario" id="floatingInput" placeholder="name@ejemplo.com" required>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="passwordUsuario" id="floatingPassword" placeholder="Contraseña" required>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
            <p class="mt-5 mb-3 text-muted">© Pokedex - 2025</p>
        </form>
    </div>
</main>

</body>
</html>