<?php
session_start();
$usuario = $_SESSION['usermane']; // 413112576

if (!isset($usuario)) {
    header("location: ./index.php");
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

    $consulta_sql = "SELECT * FROM libro";
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
        </div>
        </section>
    </main>
</body>
</html>";
}
?>
