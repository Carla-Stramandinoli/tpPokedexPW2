<?php
session_start();
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);

$emailUsuario = $_POST['emailUsuario'];
$passwordUsuario = $_POST['passwordUsuario'];

$queryUsuario = "SELECT * FROM Usuarios WHERE email LIKE '$emailUsuario'";
$consultaUsuario = mysqli_query($conexion, $queryUsuario);
$filaUsuario = mysqli_fetch_array($consultaUsuario);

$_SESSION['emailUsuario'] = $emailUsuario;

if ($filaUsuario && password_verify($passwordUsuario, $filaUsuario['password'])) {
    header("location: index.php");
    exit();
} else {
    header("location: registrarUsuarioIndex.php");
    exit();
}

