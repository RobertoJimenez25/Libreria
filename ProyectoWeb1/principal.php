<?php
session_start();
$usuario = $_SESSION['usermane'];

if (!isset($usuario)) {
    header("location: ./login.php");
} else {
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Dashboard - Principal</title>
    <link rel='stylesheet' href='./styles/stylesPrincipal.css'>
</head>
<body>
    <header class='header'>
        <h1>¡Hola, Buenas Tardes!  <span class='usuario'>$usuario</span></h1>
        <nav>
            <a class='btn-salir' href='logica/salir.php'>Salir</a>
        </nav>
    </header>
    <main>
        <section class='tabla-section'>
            <h2>Lista de Libros</h2>";

    require "./logica/conexion.php";
    mysqli_set_charset($conexion, 'utf8');

    // Obtener todos los géneros disponibles
    $generos_sql = "SELECT DISTINCT genero FROM libro";
    $generos_resultado = $conexion->query($generos_sql);

    echo "<form method='GET' action='principal.php'>
            <label for='genero'>Filtrar por Género:</label>
            <select name='genero' id='genero'>
                <option value=''>Todos</option>";
    while ($genero_row = mysqli_fetch_assoc($generos_resultado)) {
        $genero = $genero_row['genero'];
        echo "<option value='$genero'>$genero</option>";
    }
    echo "</select>
            <label for='busqueda'>Buscar por Título o Autor:</label>
            <input type='text' name='busqueda' id='busqueda' placeholder='Título o Autor'>
            <button type='submit'>Filtrar</button>
        </form>";

    $genero_filtro = isset($_GET['genero']) ? mysqli_real_escape_string($conexion, $_GET['genero']) : '';
    $busqueda_filtro = isset($_GET['busqueda']) ? mysqli_real_escape_string($conexion, $_GET['busqueda']) : '';

    $consulta_sql = "SELECT * FROM libro WHERE 1=1";
    if ($genero_filtro) {
        $consulta_sql .= " AND genero = '$genero_filtro'";
    }
    if ($busqueda_filtro) {
        $consulta_sql .= " AND (titulo LIKE '%$busqueda_filtro%' OR autor LIKE '%$busqueda_filtro%')";
    }
    $resultado = $conexion->query($consulta_sql);
    $count = mysqli_num_rows($resultado);

    if ($count > 0) {
        echo "<table class='tabla-estilos'>
                <thead>
                    <tr>
                        <th>Isbn</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Genero</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                    <td>{$row['isbn']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['autor']}</td>
                    <td>{$row['editorial']}</td>
                    <td>{$row['genero']}</td>
                    <td>{$row['precio']}</td>
                    <td>{$row['stock']}</td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='sin-registro'>Sin ningún registro</p>";
    }

    echo "<div class='acciones'>
            <a href='EliminarUsuario.php' class='btn'>Eliminar Libro</a>
            <a href='Registro.php' class='btn'>Registro</a>
            <a href='ActualizarLibro.php' class='btn'>Actualizar Libro</a>
        </div>
        </section>
    </main>
</body>
</html>";
}
?>
