<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 
<title>Registro de Administradores</title>
<link rel="stylesheet" href="styles.css">

</head>
<body>
    
<table border ="10" align="center" width="40%" height="10%" >
<tr>
<td>
<h2>Registro de Administradores</h2>
</tr>
</td>
<tr>
<td>
    <form action="usuario_administrador.php" method="post">
<tr>
<td>       
<label for="Id">ID:</label>
<input type="text" id="Id" name="Id" required class="center-input"><br>
</tr>
</td>
<tr>
<td>
<label for="Nombre">Nombre de usuario:</label>
<input type="text" id="Nombre" name="Nombre" required class="center-input"><br>
</tr>
</td> 
<tr>
<td>       
<label for="email">Correo electrónico:</label> 
<input type="text" id="email" name="email" required class="center-input"><br>     
</tr>
</td> 
<tr>
<td> 
<label for="Telefono">Telefono:</label>
<input type="text" id="Telefono" name="Telefono" required class="center-input"><br>     
</tr>
</td> 
<tr>
<td>        
<label for="Usuario">Usuario:</label>         
<input type="text" id="Usuario" name="Usuario" required class="center-input"><br>     
</tr>
</td> 
<tr>
<td> 
<label for="contrasena">Contraseña:</label>
<input type="text" id="contraseña" name="contraseña" required class="center-input"><br>
</tr>
</td> 
<tr>
<td> 
<label for="Fecha_reg">Fecha Registro:</label>
<input type="date" id="fecha_reg" name="Fecha_reg" required class="center-input"><br>
</tr>
</td> 
<tr>
<td>           
<input type="submit" value="Registrarse" class="center-input">
</tr>
</td>
</form>
</table>
</body>
</html>
<?php
// Conexión a la base de datos
include 'conexion.php';

//conectamos al base datos
$connection = new mysqli($servername, $username, $password, $dbname);

// Obtener datos del formulario
$Id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$email = $_POST['email'];
$Telefono = $_POST['Telefono'];
$Usuario = $_POST['Usuario'];
$contrasena = ($_POST['contraseña']); // Hashear la contraseña
$Fecha_reg = $_POST['Fecha_reg'];


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
}

 //indicamos el nombre de la base datos
 $dbname = "techsapiens";
//indicamos selecionar ala base datos
$db = mysqli_select_db($connection,$dbname);

if (!$db)
{
echo "No se ha podido encontrar la Tabla";
}



// Insertar datos en la base de datos
$sql = "INSERT INTO usuario_administrador (Id, Nombre, email, Telefono, Usuario, contraseña, fecha_reg) VALUES ('$Id','$nombre', '$email', '$Telefono', '$Usuario', '$contrasena', '$Fecha_reg')";

if ($connection->query($sql) === TRUE) {
    
 
echo "Registro exitoso";
} else {
    
  
echo "Error al registrar el usuario: " . $connection->error;
}

$connection->close();
?>