<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ticket de Soporte</title>
    <!-- Vincula el archivo CSS -->
    <link rel="stylesheet" href="front.css">
    
</head>
<body>

<div class="nav-bg">
    <nav class="navegacion-principal contenedor">
        <a href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"/>
                <path d="M3 10l18 0"/>
                <path d="M7 15l.01 0"/>
                <path d="M11 15l2 0"/>
            </svg>
        </a>
    </nav>
</div>

<div class="cuadro">
    <h2>Bienvenido a la creación de Tickets</h2>
    <form action="gTickets.php" method="POST" onsubmit="mostrarMensaje()">
        <div>
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
        </div>

        <div>
            <label for="asunto">Asunto del Ticket:</label>
            <select id="asunto" name="asunto">
                <option value="garantia">Garantía</option>
                <option value="daño">Daño</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div>
            <label for="descripcion">Descripción del Problema:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>
        <button type="submit" class="btn">Enviar Ticket</button>
        
    </form>
</div>

</body>
</html>