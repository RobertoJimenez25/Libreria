<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylesRegistroLogin.css">
    <title>Registro</title>
</head>
<body>

    <header class="header">
        <h3>Registro de nuevos usuarios</h3>
    </header>
    
    <div class="form-container">
        <form action="./logica/enviarRegistroLogin.php" method="post">
            <h2>Formulario</h2>
            <hr>
            <div class="form-group">
                <label for="nombre_artista">Ingresa el nombre del artista:</label>
                <input type="text" name="nombre_artista" required maxlength="100" placeholder="Nombre del artista:">
            </div>

            <div class="form-group">
                <label for="albums">¿Cuántos álbumes tiene?</label>
                <input type="text" name="albums" required maxlength="100" placeholder="Cantidad de álbumes:">
            </div>

            <div class="form-group">
                <label for="genero_musical">¿Qué género musical representa?</label>
                <input type="text" name="genero_musical" required maxlength="100" placeholder="Género musical:">
            </div>

            <div class="form-group">
                <label for="disquera">¿Cuál es su disquera?</label>
                <input type="text" name="disquera" required maxlength="100" placeholder="Nombre de la disquera:">
            </div>

            <div class="form-group">
                <label for="usuario">Usuario o correo electrónico:</label>
                <input type="text" name="usuario" required maxlength="100" placeholder="Usuario o correo:">
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" required maxlength="10" placeholder="Contraseña:">
            </div>

            <button type="submit" name="submit">Enviar Registro</button>
        </form>
        <div class="links">
        <a href='index.php'>Salir</a>
        <a href='index.php'>Inicia Sesion</a>
        </div>
    </div>

</body>
</html>


