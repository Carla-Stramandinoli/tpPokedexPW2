<?php
require_once("MiBaseDeDatos.php");

$DataBase = new MyBaseDeDatos();

$emailUsuario = $_POST['emailUsuario'];
$passwordUsuario = password_hash($_POST['passwordUsuario'], PASSWORD_DEFAULT);

$insertUsuarioNuevo = "INSERT INTO Usuarios (email, password) VALUES ('$emailUsuario', '$passwordUsuario')";
$consultaUsuarioNuevo = $DataBase->doQuery($insertUsuarioNuevo);

if($consultaUsuarioNuevo){
    header("location: index.php");
}