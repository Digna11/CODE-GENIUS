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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_producto = $_POST["id_producto"];
    $cantidad_vendida = $_POST["cantidad_vendida"];
    $precio_unitario = $_POST["precio_unitario"];

    // Consulta SQL para obtener la cantidad disponible del producto
    $sql_select = "SELECT cantidad FROM productos WHERE id = ?";
    
    // Preparar y ejecutar la consulta SELECT
    $stmt_select = $connection->prepare($sql_select);
    $stmt_select->bind_param("i", $id_producto);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();
    
    // Verificar si se encontraron resultados
    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        $cantidad_disponible = $row["cantidad"];
        
        // Verificar si hay suficiente cantidad disponible para la venta
        if ($cantidad_disponible >= $cantidad_vendida) {
            // Calcular nueva cantidad disponible después de la venta
            $nueva_cantidad = $cantidad_disponible - $cantidad_vendida;

            // Iniciar transacción para asegurar la integridad de los datos
            $connection->begin_transaction();

            try {
                // Consulta SQL para actualizar la cantidad disponible del producto en la tabla productos
                $sql_update_producto = "UPDATE productos SET cantidad = ? WHERE id = ?";
                
                // Preparar y ejecutar la consulta UPDATE
                $stmt_update_producto = $connection->prepare($sql_update_producto);
                $stmt_update_producto->bind_param("ii", $nueva_cantidad, $id_producto);
                $stmt_update_producto->execute();

                // Consulta SQL para insertar la venta en la tabla ventas
                $fecha_venta = date("Y-m-d"); // Obtener la fecha actual
                $sql_insert_venta = "INSERT INTO ventas (id_producto, cantidad_vendida, precio_unitario, fecha_venta) VALUES (?, ?, ?, ?)";
                
                // Preparar y ejecutar la consulta INSERT
                $stmt_insert_venta = $connection->prepare($sql_insert_venta);
                $stmt_insert_venta->bind_param("iiis", $id_producto, $cantidad_vendida, $precio_unitario, $fecha_venta);
                $stmt_insert_venta->execute();

                // Confirmar la transacción
                $connection->commit();

                echo "Venta realizada con éxito. Cantidad disponible actualizada.";
            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                $connection->rollback();
                echo "Error al realizar la venta: " . $e->getMessage();
            }
        } else {
            echo "No hay suficiente cantidad disponible para la venta.";
        }
    } else {
        echo "Producto no encontrado en la base de datos.";
    }
    
    // Botón para volver al inicio
    echo "<br>";
    echo "<a href='index.php'><button>Inicio</button></a>";

    // Cerrar consultas y conexión
    $stmt_select->close();
    $stmt_update_producto->close();
    $stmt_insert_venta->close();
    $connection->close();
}
?>
