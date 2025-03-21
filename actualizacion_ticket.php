<?php

$conn = new mysqli("localhost", "root", "", "tickets_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$solucion = $_POST['solucion'];
$id = $_POST['id'];  

$stmt = $conn->prepare("UPDATE ticket SET solucion = ? WHERE id = ?");
$stmt->bind_param("si", $solucion, $id); 


if ($stmt->execute()) {
    $mensaje = "Ticket solucionado.";
} else {
    $mensaje = "Error al subir el ticket: " . $stmt->error;
}

$stmt->close(); 
$conn->close();  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Factura</title>
    <script>
        setTimeout(function() {
            window.location.href = "consulta.php";
        }, 5000); 
    </script>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
    <p>Volviendo a la gestión de Tickets...</p>
</body>
</html>
