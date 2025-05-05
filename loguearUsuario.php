<?php
session_start();
require_once("MiBaseDeDatos.php");

$DataBase = new MyBaseDeDatos();

$emailUsuario = $_POST['emailUsuario'];
$passwordUsuario = $_POST['passwordUsuario'];

$queryUsuario = "SELECT * FROM Usuarios WHERE email LIKE '$emailUsuario'";
$consultaUsuario = $DataBase->doQuery($queryUsuario);
$filaUsuario = mysqli_fetch_array($consultaUsuario);

$_SESSION['emailUsuario'] = $emailUsuario;

if ($filaUsuario && password_verify($passwordUsuario, $filaUsuario['password'])) {
    header("location: index.php");
    exit();
} else {
    header("location: registrarUsuarioIndex.php");
    exit();
}

