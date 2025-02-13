<?php
require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];


//La función COUNT devuelve el número de filas de la consulta, es decir, el número de registros que cumplen una determinada condición.

//Los valores nulos no serán contabilizados
$q = "SELECT COUNT(*) as contar from usuario where usuario = '$usuario' and contraseña = '$contraseña'";

$consulta = mysqli_query($conexion, $q);

$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {

    // en la variable session se guarda el numero de cuenta esto para poder acarrearla
    $_SESSION['usermane'] = $usuario;

    header("location: ../Principal.php");
    //header("location: ../inicio.php");
    
} else {

    header("location: ../indexError.php");
}
?>