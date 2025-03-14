<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front.css">
</head>
<body>
    
    <div class="nav-bg">
            <nav class="navegacion-principal contenedor">
            <a href="cTickets.php"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                        <path d="M3 10l18 0" />
                        <path d="M7 15l.01 0" />
                        <path d="M11 15l2 0" />
                    </svg>
                </div></a>
            </nav>
 </div>

        <form action="validacion_login.php"></form>
            

            <h2>Login</h2>

<div class="login">
    
    <form action="validacion_login.php" method="POST">
        <div class="input-group">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" id="password" name="contraseña" required>
        </div>
        <div class="error" id="errorMessage">Por favor, ingrese un usuario y contraseña válidos.</div>
        <button type="submit" class="btn">Iniciar sesión</button>

      
        
        
    </form>
</div>



</body>
</html>