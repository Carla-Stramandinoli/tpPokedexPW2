<?php
$conexion = mysqli_connect("localhost", "root", 'ikkinaga22', "PokedexPW2", 3307);

$emailUsuario = $_POST['emailUsuario'];
$passwordUsuario = password_hash($_POST['passwordUsuario'], PASSWORD_DEFAULT);

$insertUsuarioNuevo = "INSERT INTO Usuarios (email, password) VALUES ('$emailUsuario', '$passwordUsuario')";
$consultaUsuarioNuevo = mysqli_query($conexion, $insertUsuarioNuevo);

if($consultaUsuarioNuevo){
    header("location: index.php");
}