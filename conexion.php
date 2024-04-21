<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "electronica";

$connection = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($connection->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>