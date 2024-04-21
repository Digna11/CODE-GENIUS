<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <br>
    <title>Total</title>
    <link rel="stylesheet" href="style.css">
</head>


<?php
include 'conexion.php';
// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre del producto buscado
    $nombre_producto = $_POST["nombre_producto"];

    // Consulta SQL para buscar el producto por su nombre
    $sql = "SELECT nombre, precio, cantidad FROM productos WHERE nombre = ?";
    
    // Preparar la consulta
    $stmt = $connection->prepare($sql);
    
    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("s", $nombre_producto);
    $stmt->execute();
    
    // Obtener resultados de la consulta
    $result = $stmt->get_result();
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar la información del producto encontrado
        while ($row = $result->fetch_assoc()) {
           
            echo "Nombre: " . $row["nombre"] . "<br>";
            echo "Precio: $" . $row["precio"] . "<br>";
            echo "Cantidad disponible: " . $row["cantidad"] . "<br>";
            
        }
    } else {
        echo "No se encontraron resultados para el producto: " . $nombre_producto;
    }

    // Botón para volver al inicio
    echo "<br>";
    echo "<a href='index.php'><button>Inicio</button></a>";
    
   
}
?>