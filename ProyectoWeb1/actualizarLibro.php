<?php
require "logica/conexion.php";
mysqli_set_charset($conexion, 'utf8');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['buscar'])) {
        // Lógica para buscar el libro por ISBN
        $isbn = mysqli_real_escape_string($conexion, $_POST['isbn']);
        $consulta = $conexion->prepare("SELECT * FROM libro WHERE isbn = ?");
        $consulta->bind_param("s", $isbn);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $libro = $resultado->fetch_assoc();
        $consulta->close();

        if ($libro) {
            // Mostrar el formulario de actualización con los datos del libro
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Actualizar Libro</title>
                <link rel="stylesheet" href="./styles/stylesactualizarLibro.css">
            </head>
            <body>
                <header class="header">
                    <h3>Atualizacion Libro</h3>
                </header>
                <h2>Actualizar Libro</h2>
                <hr>
                <div class="form-container">
                    <form action="ActualizarLibro.php" method="post">
                    <input type="hidden" name="isbn" value="<?php echo $libro['isbn']; ?>">
                    <input type="hidden" name="actualizar" value="1">
                    
                    <div class = "form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $libro['titulo']; ?>" required><br>
                    </div>

                    <div class = "form-group">
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" value="<?php echo $libro['autor']; ?>" required><br>
                    </div>

                    <div class = "form-group">
                    <label for="editorial">Editorial:</label>
                    <input type="text" id="editorial" name="editorial" value="<?php echo $libro['editorial']; ?>" required><br>
                    </div>

                    <div class = "form-group">
                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero" value="<?php echo $libro['genero']; ?>" required><br>
                    </div>

                    <div class = "form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" id="precio" name="precio" value="<?php echo $libro['precio']; ?>" required><br>
                    </div>

                    <div class = "form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" id="stock" name="stock" value="<?php echo $libro['stock']; ?>" required><br>
                    </div>
                    <input type="submit" value="Actualizar Libro">
                    </form>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "<script>alert('No se encontró el libro con el ISBN proporcionado'); window.location.href = 'ActualizarLibro.php';</script>";
        }
    } elseif (isset($_POST['actualizar'])) {
        // Lógica para actualizar el libro con los datos proporcionados
        $isbn = mysqli_real_escape_string($conexion, $_POST['isbn']);
        $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
        $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
        $editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);
        $genero = mysqli_real_escape_string($conexion, $_POST['genero']);
        $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
        $stock = mysqli_real_escape_string($conexion, $_POST['stock']);

        $consulta = $conexion->prepare("UPDATE libro SET titulo = ?, autor = ?, editorial = ?, genero = ?, precio = ?, stock = ? WHERE isbn = ?");
        $consulta->bind_param("ssssdis", $titulo, $autor, $editorial, $genero, $precio, $stock, $isbn);

        if ($consulta->execute()) {
            echo "<script>alert('Libro actualizado con éxito'); window.location.href = 'principal.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el libro: " . $consulta->error . "');</script>";
        }

        $consulta->close();
        mysqli_close($conexion);
    }
} else {
    // Mostrar el formulario para ingresar el ISBN
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Libro</title>
        <link rel="stylesheet" href="./styles/stylesactualizarLibro.css">
    </head>
    <body>
    <header class="header">
        <h3>Actualizar Libro</h3>
    </header>
    <div class="form-container">
        <h1>Actualizar Libro</h1>
        <form action="ActualizarLibro.php" method="post">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required><br>
            <input type="hidden" name="buscar" value="1">
            <input type="submit" value="Buscar Libro">
        </form>
    </div>
    </body>
    </html>
    <?php
}
?>