
<?php
include "conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Sanitizar los datos para prevenir inyección SQL
$isbn = mysqli_real_escape_string($conexion, $_POST['isbn']);
$titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
$autor = mysqli_real_escape_string($conexion, $_POST['autor']);
$editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);
$editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);
$genero = mysqli_real_escape_string($conexion, $_POST['genero']);
$precio = mysqli_real_escape_string($conexion, $_POST['precio']);
$stock = mysqli_real_escape_string($conexion, $_POST['stock']); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de un nuevo Libro</title>
    <link rel="stylesheet" href="../styles/stylesEnviarRegistro.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="container">
        <?php
        // Verificar si el usuario ya existe
        $buscarusuario = "SELECT * FROM libro WHERE isbn = '$isbn'";
        $resultado = $conexion->query($buscarusuario);

        if ($resultado && $resultado->num_rows > 0) {
            echo "<p class='error'>El usuario ya está registrado.</p>";
            echo "<a href='../Registro.php'>Nuevo registro</a>";
        } else {
            // Intentar insertar el nuevo usuario
            $consulta = "INSERT INTO libro (isbn, titulo, autor, editorial, genero, precio, stock)
                         VALUES ('$isbn', '$titulo', '$autor', '$editorial', '$genero', '$precio', '$stock')";

            if ($conexion->query($consulta) === TRUE) {
                echo "<h1 class='success'>Libro registrado con éxito</h1>";
                echo "<a class='check' href='../Registro.php'>Puedes generar un nuevo Libro</a>";
                echo "<a href='../Principal.php'>Ver Libros</a>";
            } else {
                // Mostrar el error de MySQL si la consulta falla
                echo "<p class='error'>Error al crear el registro: " . $conexion->error . "</p>";
            }
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </div>
</body>
</html>
