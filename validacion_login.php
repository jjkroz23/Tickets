<?php
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "tickets_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del index
$username = $_POST['username'];
$contraseña = $_POST['contraseña'];

// Consulta para verificar usuario
$sql = "SELECT id FROM ingreso WHERE username = ? AND contraseña = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $contraseña);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Usuario válido, iniciar sesión
    $_SESSION['username'] = $username; // Guardar información del usuario en sesión
    header("Location: menu.php"); // Redirigir a la página principal
    exit();
} else {
    // Usuario no válido
    echo "Username o contraseña incorrectos.<br>";
    echo "<a href='index.php'>Volver a intentar</a>";
}

$stmt->close();
$conn->close();
?>