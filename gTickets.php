<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "tickets_db");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoger datos del ticket
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];

    // Depurar la consulta SQL
    $sql = "INSERT INTO ticket (nombre, correo, asunto, descripcion) VALUES ('$nombre', '$correo', '$asunto', '$descripcion')";
    echo "Consulta SQL: $sql<br>";  // Muestra la consulta SQL para ver si está bien formada

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir después de la inserción exitosa
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Muestra el error si no se ejecuta
    }

    // Cerrar la conexión
    $conn->close();
}
?>


