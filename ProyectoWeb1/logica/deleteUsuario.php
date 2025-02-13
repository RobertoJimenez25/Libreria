<?php
require "conexion.php";
mysqli_set_charset($conexion, 'utf8');

if (isset($_POST['isbn']) && !empty($_POST['isbn'])) {
    $registroEliminado = mysqli_real_escape_string($conexion, $_POST['isbn']);
    $consulta = $conexion->prepare("DELETE FROM libro WHERE isbn = ?");
    $consulta->bind_param("s", $registroEliminado);

    if ($consulta->execute()) {
        if ($consulta->affected_rows > 0) {
            $consulta->close();
            mysqli_close($conexion);
            echo "<script>alert('Usuario eliminado con éxito'); window.location.href = '../eliminarUsuario.php';</script>";
        } else {
            echo "<script>alert('No se encontró el usuario con el ISBN proporcionado'); window.location.href = '../eliminarUsuario.php';</script>";
        }
    } else {
        echo "Error en la consulta: " . $consulta->error;
        $consulta->close();
    }
} else {
    echo "Error: no se recibió el ISBN a eliminar.";
}

mysqli_close($conexion);
?>
