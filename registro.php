
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="front.css">
</head>
<body>
    <?php
    include("conexion_bd.php");
    include("validarNuevoUsuario.php");
    ?>  
    <form action="validarNuevoUsuario.php" method="post">
    <div class="registro">
    <h2>Registro de Usuario</h2>

        <div class="usuario">
    <label for="usuario">Nombre de usuario:</label>
    <input type="text" id="username" name="username" required><br>
    </div>
        <div class="contraseña">
    <label for="contraseña">Contraseña:</label>
    <input type="password" id="password" name="contraseña" required><br>
    </div>

    <button class="btn" type="submit" value="Registrar" name="registro">Registrar</button>
    <a href="index.php"></a>

    
    </div>
</form>


    <a href="index.php">Volver</a>

</body>
</html>


