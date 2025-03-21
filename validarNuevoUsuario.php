<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "tickets_db");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $contraseña = $_POST['contraseña'];

    
    $sql = "INSERT INTO ingreso (username, contraseña) VALUES (?, ?)";
    
   
    if ($stmt = $conn->prepare($sql)) {
      
        $stmt->bind_param("ss", $username, $contraseña); 

       
        if ($stmt->execute()) {
            
            header("Location: index.php");
            exit();
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
