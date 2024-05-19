<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techsapiens";

$connection = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
}
?>