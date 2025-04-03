<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_ticket = $_POST['id_ticket'];
    $id_usuario = $_POST['id_usuario'];
    $estrellas = $_POST['estrellas'];
    $comentario = $_POST['comentario'];

    // Validar datos
    if ($estrellas < 1 || $estrellas > 5) {
        echo json_encode(["error" => "La calificación debe estar entre 1 y 5 estrellas."]);
        exit;
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO valoraciones (id_ticket, id_usuario, estrellas, comentario) 
            VALUES ('$id_ticket', '$id_usuario', '$estrellas', '$comentario')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["mensaje" => "Valoración registrada correctamente."]);
    } else {
        echo json_encode(["error" => "Error al guardar la valoración: " . $conn->error]);
    }

    $conn->close();
}
?>
