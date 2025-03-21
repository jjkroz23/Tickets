<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $conn = new mysqli("localhost", "root", "", "tickets_db");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];

  
    $sql = "INSERT INTO ticket (nombre, correo, asunto, descripcion) VALUES ('$nombre', '$correo', '$asunto', '$descripcion')";
    echo "Consulta SQL: $sql<br>"; 


    if ($conn->query($sql) === TRUE) {
      
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }

    
    $conn->close();
}
?>


