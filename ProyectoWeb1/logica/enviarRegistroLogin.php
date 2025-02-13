<?php
include "conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Sanitizar los datos para prevenir inyección SQL
$nombreUser = mysqli_real_escape_string($conexion, $_POST['nombre_artista']);
$albums = mysqli_real_escape_string($conexion, $_POST['albums']);
$genero = mysqli_real_escape_string($conexion, $_POST['genero_musical']);
$disquera = mysqli_real_escape_string($conexion, $_POST['disquera']);
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$password = mysqli_real_escape_string($conexion, $_POST['contraseña']); // Considera hashear la contraseña
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Artistas</title>
    <link rel="stylesheet" href="../styles/stylesEnviarRegistroLogin.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="container">
        <?php
        // Verificar si el usuario ya existe
        $buscarusuario = "SELECT * FROM artistas WHERE nombre_artista = '$nombreUser'";
        $resultado = $conexion->query($buscarusuario);

        if ($resultado && $resultado->num_rows > 0) {
            echo "<p class='error'>El usuario ya está registrado.</p>";
            echo "<a href='../registroLogin.php'>Nuevo registro</a>";
        } else {
            // Intentar insertar el nuevo usuario
            $consulta = "INSERT INTO artistas (nombre_artista, albums, genero_musical, disquera, usuario, contraseña) 
                         VALUES ('$nombreUser', '$albums', '$genero', '$disquera', '$usuario', '$password')";

            if ($conexion->query($consulta) === TRUE) {
                echo "<h1 class='success'>Usuario creado con éxito</h1>";
                echo  "<a href='../index.php'>Salir</a>";
                echo "<a href='../index.php'>Inicia Sesion</a>";
            } else {
                // Mostrar el error de MySQL si la consulta falla
                echo "<p class='error'>Error al crear el usuario: " . $conexion->error . "</p>";
            }
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </div>
</body>
</html>
