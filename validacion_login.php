<?php
session_start();


$conn = new mysqli("localhost", "root", "", "tickets_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$username = $_POST['username'];
$contraseña = $_POST['contraseña'];


$sql = "SELECT id FROM ingreso WHERE username = ? AND contraseña = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $contraseña);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $_SESSION['username'] = $username; 
    header("Location: menu.php"); 
    exit();
} else {
    
    echo "Username o contraseña incorrectos.<br>";
    echo "<a href='index.php'>Volver a intentar</a>";
}

$stmt->close();
$conn->close();
?>