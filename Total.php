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

$sql_total_ventas = "SELECT SUM(cantidad_vendida * precio_unitario) AS total_ventas FROM ventas";

// Ejecutar la consulta para obtener el total de ventas
$result_total_ventas = $connection->query($sql_total_ventas);

// Obtener el total de ventas
$total_ventas = 0;
if ($result_total_ventas->num_rows > 0) {
    $row_total_ventas = $result_total_ventas->fetch_assoc();
    $total_ventas = $row_total_ventas["total_ventas"];
}

// Consulta SQL para obtener los productos vendidos y su cantidad
$sql_productos_vendidos = "SELECT p.nombre AS nombre_producto, p.precio, v.cantidad_vendida, SUM(v.cantidad_vendida * p.precio) AS total_venta_producto
                            FROM ventas v
                            INNER JOIN productos p ON v.id_producto = p.id
                            GROUP BY v.id_producto";

// Ejecutar la consulta para obtener los productos vendidos y su cantidad
$result_productos_vendidos = $connection->query($sql_productos_vendidos);

// Mostrar la tabla con los productos vendidos y su cantidad, junto con el total de todas las ventas
echo "<table border='1'>";
echo "<tr><th>Nombre Producto</th><th>Cantidad Vendida</th><th>Precio Producto</th><th>Total Venta Producto</th></tr>";

if ($result_productos_vendidos->num_rows > 0) {
    while ($row_productos_vendidos = $result_productos_vendidos->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row_productos_vendidos["nombre_producto"] . "</td>";
        echo "<td>" . $row_productos_vendidos["cantidad_vendida"] . "</td>";
        echo "<td>$" . $row_productos_vendidos["precio"] . "</td>";
        echo "<td>$" . number_format($row_productos_vendidos["total_venta_producto"], 2) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron registros de ventas de productos.</td></tr>";
}

// Mostrar el total de todas las ventas
echo "<tr><td colspan='3'><b>Total Ventas:</b></td><td><b>$" . number_format($total_ventas, 2) . "</b></td></tr>";
echo "</table>";

// Botón para volver al inicio
echo "<br>";
echo "<a href='index.php'><button>Inicio</button></a>";

// Cerrar la conexión

$connection->close();
?>