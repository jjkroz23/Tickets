<?php
$conn = new mysqli("localhost", "root", "", "tickets_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$ticket_id = null;
$ticket_info = null;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ticket_id'])) {
    $ticket_id = $_POST['ticket_id'];

  
    if (is_numeric($ticket_id) && $ticket_id >= 1 && $ticket_id <= 100) {
        
        $sql = "SELECT * FROM ticket WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $ticket_id); 
        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            
            $ticket_info = $result->fetch_assoc();
        } else {
            
            $ticket_info = "No se encontró el ticket con ID: $ticket_id";
        }

        $stmt->close();
    } else {
        $ticket_info = "Por favor, ingrese un ID válido entre 1 y 100.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Ticket Cerrado</title>
    <link rel="stylesheet" href="front.css">
    <script src="gestionCerrado.js"></script>
</head>
<body>

    <div class="container">
        <h1>Detalles del Ticket Cerrado</h1>

       
        <div class="cuadro">
            <form method="POST">
                <label for="ticket_id">ID de Ticket (1-100):</label>
                <input type="number" id="ticket_id" name="ticket_id" placeholder="Ingresa un número entre 1 y 100" min="1" max="100" required>
                <button type="submit">Ver Detalles</button>
            </form>

 
            <?php if ($ticket_info !== null): ?>
                <div id="ticket-info">
                    <?php if (is_array($ticket_info)): ?>
                        <p><strong>Solución: </strong> <?php echo $ticket_info['solucion']; ?></p>
                        <p><strong>Descripción: </strong> <?php echo $ticket_info['descripcion']; ?></p>
                        <p><strong>Asesor: </strong> <?php echo $ticket_info['asesor']; ?></p> 
                    <?php else: ?>
                        <p><strong>Mensaje:</strong> <?php echo $ticket_info; ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

     
        <div id="notification" class="notification hidden">
            <p id="notification-msg"></p>
        </div>

        <a href="menu.php" class="btn">Volver</a>
    </div>

</body>
</html>
