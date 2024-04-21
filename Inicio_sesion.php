<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <title>Inicio de Sesión</title>
</head>
<body>
<div class="container">
<table border ="1" align="center">
    <tr>
        <td>
        
    <h2>Iniciar Sesión</h2>
    <link rel="stylesheet" href="style.css">
</td>
</tr>
<tr>
    <td>
    <br>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        <br>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <br>
        <div style="display: flex; justify-content: center; align-items: center; height: 50px;">
        <button>Iniciar Sesión</button>
        </div>  
        <br>
        <br>

    </form>

</td>
</tr>
</table>
</div>
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar las credenciales del usuario (aquí puedes agregar tu lógica de autenticación)
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Por simplicidad, aquí se compara el usuario y contraseña con valores fijos
        $usuario_valido = "digncalo"; // Cambiar por tu usuario válido
        $contrasena_valida = "papel"; // Cambiar por tu contraseña válida

        if ($username == $usuario_valido && $password == $contrasena_valida) {
            // Iniciar sesión y redirigir al usuario a la página de inicio
            session_start();
            $_SESSION["username"] = $username;
            header("Location: index.php"); // Cambiar por la página de inicio de tu aplicación
            exit();
        } else {
            echo "<p style='color: red;'>Credenciales inválidas. Inténtalo de nuevo.</p>";
        }
    }
    
    ?>
    
</body>
</html>