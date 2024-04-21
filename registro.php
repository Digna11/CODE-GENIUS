<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Muestra Stock</title>
    <link rel="stylesheet" href="style.css">
     
     
</head>
<body>
    
</body>
</html>


<?php
//validamos datos del servidor
include 'conexion.php';

//conectamos al base datos
$connection = mysqli_connect($servername, $username, $password, $database);

//hacemos llamado al imput de formuario
$Id = $_POST["Id"] ;
$nombre = $_POST["nombre"] ;
$precio = $_POST["precio"] ;
$cantidad = $_POST["cantidad"] ;

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $database = "electronica";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$database);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO productos (Id, nombre, precio, cantidad)
                             VALUES ('$Id','$nombre','$precio', '$cantidad')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM productos";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}

echo "<table>";
echo "<tr>";
echo "<th><h3>Id</th></h3>";
echo "<th><h3>nombre</th></h3>";
echo "<th><h3>precio</th></h3>";
echo "<th><h3>cantidad</th></h3>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h5>" . $colum['Id']. "</td></h5>";
    echo "<td><h5>" . $colum['nombre']. "</td></h5>";
    echo "<td><h5>" . $colum['precio'] . "</td></h5>";
    echo "<td><h5>" . $colum['cantidad'] . "</td></h5>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

  // Botón para volver al inicio
echo "<br>";
echo "<a href='index.php'><button>Inicio</button></a>";


?>