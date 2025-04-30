<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_ticket'])) {
    $id_ticket = $_GET['id_ticket'];

    $sql = "SELECT * FROM valoraciones WHERE id_ticket = '$id_ticket'";
    $result = $conn->query($sql);

    $valoraciones = [];

    while ($row = $result->fetch_assoc()) {
        $valoraciones[] = $row;
    }

    echo json_encode($valoraciones);
} else {
    echo json_encode(["error" => "ID de ticket no proporcionado"]);
}

$conn->close();
?>
