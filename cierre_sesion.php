<?php
// Iniciamos la sesión
session_start();

// Destruimos todas las variables de sesión
session_destroy();

// Redirigimos al usuario a la página de inicio de sesión
header("Location: Inicio_sesion.php");
exit;
?>