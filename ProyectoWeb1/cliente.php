<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesCliente.css">
    <title>Libreria Dummy</title>
</head>
<body>
    <header>
        <h1 class="title"> ¡Bienvenido! </h1> 
        <h2 class="subtitle"> Librería Dummy </h2>
        <nav>
            <ul>
                <li><a href = "catalogo.php">Ir a catalogo</a></li>
                <li><a href="index.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="indicaciones">
        <h2>Sumergete en historias fascinantes...</h2>
        <p>Utiliza el menú para iniciar sesión si eres empleado <br> Estimado cliente explora nuestro catalogo y sumergete con la gran variedad de ejemplares.</p>
    </div>
        <div class="carousel">
            <div class="carousel-container" id="carousel">
                <img src="media/lib1.jpg" alt="Imagen 1">
                <img src="media/lib2.jpg" alt="Imagen 2">
                <img src="media/lib3.jpg" alt="Imagen 3">
            </div>
            <button class="btn prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="btn next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Librería Dummy</p>
    </footer>
    <script src="scripts/scriptCliente.js"></script>
</body>
</html>