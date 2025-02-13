<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/stylesIndex.css">
</head>
<body>
    <div class="row">
        <div class="col">
            <h1>¡Bienvenido! <br> Inicia Sesión para continuar.</h1>
            <form method="POST" action="logica/loguear.php">
                <input type="text" name="usuario" placeholder="Usuario" />
                <input type="password" name="contraseña" placeholder="Contraseña" />
                <button type="submit">Iniciar Sesión</button>
            </form>
            <p>¿No tienes cuenta? <a href="registroLogin.php"><button type="button">Registrarse</button></a></p>
        </div>
    </div>
</body>
</html>
