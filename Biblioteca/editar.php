
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cantidad de Libros</title>
</head>
<body>

    <h2>Editar Cantidad de Libros</h2>
    <form action="editar.php" method="post">
        <input type="hidden" name="id_libro" value="<?php echo $id_libro; ?>">
        <label for="nueva_cantidad">Nueva Cantidad:</label>
        <input type="number" id="nueva_cantidad" name="nueva_cantidad" required><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
    <?php
    // Conexión a la base de datos
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los datos del formulario están presentes
    if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
        // Conectar a la base de datos
        $connection = new mysqli($servername, $username, $password, $dbname);

  //verificamos la conexion a base datos
if(!$connection) 
{
    echo "No se ha podido conectar con el servidor" . mysql_error();
}
else
{
    echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
}
// Verificar conexión
if ($connection->connect_error) {
die("Conexión fallida: " . $connection->connect_error);


//indicamos el nombre de la base datos
$dbname = "techsapiens";
//indicamos selecionar ala base datos
$db = mysqli_select_db($connection,$dbname);

if (!$db)
{
echo "No se ha podido encontrar la Tabla";
}
//indicamos el nombre de la base datos
$dbname = "techsapiens";
//indicamos selecionar ala base datos
$db = mysqli_select_db($connection,$dbname);

if (!$db)
{
echo "No se ha podido encontrar la Tabla";
}

        // Cerrar la conexión a la base de datos
        $connection->close();
    } else {
        // Mostrar el formulario para editar la cantidad de libros
        $id_libro = $_GET['id']; // Obtener el ID del libro de la URL
    }}}
    ?>
    