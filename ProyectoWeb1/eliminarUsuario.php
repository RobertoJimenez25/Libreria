<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="./styles/stylesEliminarUsuario.css">
</head>

<body>
    <div class="container">
        <h1>Eliminar Libro</h1>
        <form method="POST" action="./logica/deleteUsuario.php">
            <input type="text" name="usuario" placeholder="ISBN del Libro a Eliminar" required />
            <button type="submit">Eliminar</button>
        </form>
        <a href="principal.php" class="btn-back">Inicio de Listas</a>
    </div>
</body>

</html>
