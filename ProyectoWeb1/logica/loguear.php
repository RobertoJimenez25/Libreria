<?php
require 'conexion.php';
session_start();

$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

// Verificar si el usuario es admin
$consulta = $conexion->prepare("SELECT COUNT(*) as contar FROM usuario WHERE usuario = ? AND contraseña = ? AND usuario = 'admin'");
$consulta->bind_param("ss", $usuario, $contraseña);
$consulta->execute();
$resultado = $consulta->get_result();
$array = $resultado->fetch_assoc();

if ($array['contar'] > 0) {
    $_SESSION['usermane'] = $usuario;
    header("location: ../principal.php");
} else {
    header("location: ../indexError.php");
}

$consulta->close();
mysqli_close($conexion);
?>