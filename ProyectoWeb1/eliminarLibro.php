<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="./styles/styleseliminarLibro.css">
</head>

<body>
    <div class="container">
        <h1>Eliminar Libro</h1>
        <form method="POST" action="./logica/deleteLibro.php">
            <input type="text" name="isbn" placeholder="ISBN del Libro a Eliminar" required />
            <button type="submit">Eliminar</button>
        </form>
        <a href="mainAdmin.php" class="btn-back">Inicio de Listas</a>
    </div>
</body>

</html>
