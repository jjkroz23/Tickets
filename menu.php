<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido la Gestion de Tickets</title>
    <link rel="stylesheet" href="front.css">
</head>
<body>
    <header>
        <h1>Gestión de tickets</h1>
        <nav>
            <div class="menu-consulta">
                <a href="consulta.php">Consulta de tickets</a>
            </div>

        </nav>
    </header>
    <footer>
        <p>&copy; 2025. Todos los derechos reservados.</p>
    </footer>
    <a href="index.php">Cerrar sesion</a>
</body>
</html>
