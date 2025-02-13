<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylesRegistro.css">
    <title>Registro</title>
</head>
<body>

    <header class="header">
        <h3>Registro de Libro</h3>
    </header>
    
    <div class="form-container">
        <form action="./logica/enviarRegistro.php" method="post">
            <h2>Formulario</h2>
            <hr>
            <div class="form-group">
                <label for="isbn">Ingresa el ISBN del Libro:</label>
                <input type="text" name="isbn" required maxlength="100" placeholder="ISBN del Libro:">
            </div>

            <div class="form-group">
                <label for="titulo">Titulo del Libro:</label>
                <input type="text" name="titulo" required maxlength="100" placeholder="Titulo del Libro:">
            </div>

            <div class="form-group">
                <label for="autor">Autor del Libro:</label>
                <input type="text" name="autor" required maxlength="100" placeholder="Autor del Libro:">
            </div>

            <div class="form-group">
                <label for="editorial">Editorial del Libro:</label>
                <input type="text" name="editorial" required maxlength="100" placeholder="Editorial del Libro:">
            </div>

            <div class="form-group">
                <label for="genero">Genero Literario:</label>
                <input type="text" name="genero" required maxlength="100" placeholder="Genero Literario:">
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" required maxlength="30" placeholder="Precio:">
            </div>

            <div class="form-group">
                <label for="stock">Stock Disponible:</label>
                <input type="text" name="stock" required maxlength="100" placeholder="Stock Disponible:">
            </div>

            <button type="submit" name="submit">Enviar Registro</button>
        </form>
        <div class="links">
            <a href="./Registro.php">Nuevo registro</a>
            <a href="./Principal.php">Ver registro</a>
        </div>
    </div>

</body>
</html>
