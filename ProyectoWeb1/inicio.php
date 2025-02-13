<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Artistas</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="stylesInicio.css">
</head>
<body>
    <?php
    // Código PHP para generar la tabla
    require "conexion.php";
    mysqli_set_charset($conexion, 'utf8');

    $consulta_sql = "SELECT * FROM artistas";
    $resultado = $conexion->query($consulta_sql);
    $count = mysqli_num_rows($resultado);

    echo "<table class='tabla-estilos'>
        <tr>
            <th>Artistas</th>
            <th>ID</th>
            <th>Nombre Artista</th>
            <th>Álbums</th>
            <th>Género Musical</th>
            <th>Disquera</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Fecha de Registro</th>
            <th>Permisos</th>
        </tr>";

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['nombre_artista'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre_artista'] . "</td>";
            echo "<td>" . $row['albums'] . "</td>";
            echo "<td>" . $row['genero_musical'] . "</td>";
            echo "<td>" . $row['disquera'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>" . $row['contraseña'] . "</td>";
            echo "<td>" . $row['fecha_registro'] . "</td>";
            echo "<td>" . $row['permisos'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h1 class='sin-registro'>Sin ningún registro</h1>";
    }
    ?>
</body>
</html>
