<?php

$conn = new mysqli("localhost", "root", "", "tickets_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM ticket";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central de tickets</title>
    <link rel="stylesheet" href="front.css">
</head>
<body>
    <header>
        <h1>Tickets</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Asunto</th>
                <th>Descripción</th>
                <th>Solución</th>
                <th>Tiempo de Resolución</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $tiempo_resolucion = "";
                    switch ($row["asunto"]) {
                        case "garantia":
                            $tiempo_resolucion = "3 horas";
                            break;
                        case "daño":
                            $tiempo_resolucion = "24 horas";
                            break;
                        case "otro":
                            $tiempo_resolucion = "12 horas";
                            break;
                    }

                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . $row["asunto"] . "</td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["solucion"] . "</td>";
                    echo "<td>" . $tiempo_resolucion . "</td>";
                    echo "<td>";
                    echo "<a href='solucion_ticket.php?id=" . $row["id"] . "'>Solucionar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay facturas</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </main>
    <footer>
        <a href="menu.php">Volver al inicio</a>
        <p>&copy; 2025. Todos los derechos reservados.</p>
    </footer>
</body>
</html>