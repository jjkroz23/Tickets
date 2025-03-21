<?php

session_start();


$conn = new mysqli("localhost", "root", "", "tickets_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}


$username = $_SESSION['username'];


$id = $_GET['id'] ?? null;

if ($id) {
   
    $stmt = $conn->prepare("SELECT id, solucion, agente_mayor FROM ticket WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Error: ID del ticket no proporcionado.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agente_mayor'])) {
    $agente_mayor = $_POST['agente_mayor'];

   
    $update_stmt = $conn->prepare("UPDATE ticket SET agente_mayor = ? WHERE id = ?");
    $update_stmt->bind_param("si", $agente_mayor, $id); 
    if ($update_stmt->execute()) {
        echo "Ticket asignado correctamente al agente: " . $agente_mayor;
    } else {
        echo "Error al asignar el agente mayor: " . $update_stmt->error;
    }
    $update_stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ticket</title>
    <link rel="stylesheet" href="front.css">
</head>
<body>
    <main>
        <div class="header">
        
            <p>Bienvenido, <strong><?php echo htmlspecialchars($username); ?></strong></p>
        </div>

        <div class="actualizacion">
            <h1>Editar Factura</h1>
            <div class="cuadro_actua">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">

                    <label for="solucion">Solución: </label>
                    <input type="text" name="solucion" value="<?php echo htmlspecialchars($ticket['solucion']); ?>" required>

                    <label for="agente_mayor">Area encargada: </label>
                    <select name="agente_mayor" id="agente_mayor" required>
                        <option value="Atención al cliente" <?php echo ($ticket['agente_mayor'] == 'Atención al cliente') ? 'selected' : ''; ?>>Atención al cliente</option>
                        <option value="Seguro" <?php echo ($ticket['agente_mayor'] == 'Seguro') ? 'selected' : ''; ?>>Seguro</option>
                        <option value="PQR" <?php echo ($ticket['agente_mayor'] == 'PQR') ? 'selected' : ''; ?>>PQR</option>
                    </select>

                    <input type="submit" value="Actualizar Ticket">
                </form>
            </div>

            <a href="consulta.php" class="btn">Volver</a>
        </div>
    </main>
</body>
</html>
