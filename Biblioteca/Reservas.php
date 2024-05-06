<!DOCTYPE html>
<html>
<head>
    <title>Reserva de Libros</title>
    <link rel="stylesheet" href="styles.css">
    <header>
    <section class="header-icons-container">
        <div class="icons_boton">
        <a href="Registro_Usuarios.php"><span class=><button>Registro Usuarios</button></span></a>
        <a href="Registro_Libros.php"><span class=><button>Registro Libros</button></span></a>
        <a href="Reservas.php"><span class=><button>Reservas</button></span></a>
        <a href="Alquileres.php"><span class=><button>Alquileres</button></span></span></a>
        <a href="index.php"><span class=><button>Inicio</button></span></span></a>
        </div>
        </section>
    <nav>
            <section class="nav-logo-container">
                <a href=""><img src="Imagenes/Logo.png" alt="Logo de mi blog"></a>
            </section>
            <section class="profile-link">
                <a href="perfil.html"></a>
            </section>  
        </nav>
</head>

</header>
<body>

    <table border ="10" align="center" width="40%" height="10%" >
    <tr>
    <td>
    <h2>Registro de Reserva</h2>
    </tr>
    </td>
    <tr>
    <td>
    <form action="Reservas.php" method="post">
    <tr>
    <td>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="Usuario" required class="center-input"><br><br>
    </tr>
    </td>
    <tr>
    <td>
        <label for="libro">Libro:</label>
        <input type="text" id="libro" name="libro" required class="center-input"><br><br>
</tr>
</td> 
     <tr>
     <td>
        <label for="fecha_reserva">Fecha de Reserva:</label>
        <input type="date" id="apellido" name="apellido" required class="center-input"><br><br>
    </tr>
    </td> 
    <tr>
     <td>
           <div style="display: flex; justify-content: center; align-items: center; height: 50px;">
        <button>Registrar</button>
        </div>  
    </tr> 
    </td>
    </form>
</table>

  </body>
</html> 
    <?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$libro = $_POST['libro'];
$fecha_reserva = $_POST['fecha_reserva'];

$connection = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

// Crear la consulta SQL para insertar el usuario en la tabla usuarios
$sql = "INSERT INTO reservas ( usuario, libro, fecha_reserva)
VALUES ('$usuario', '$libro', '$fecha_reserva')";

// Ejecutar la consulta SQL
if ($connection->query($sql) === TRUE) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error al registrar el usuario: " . $connection->error;
}

// Cerrar la conexión
$connection->close();
?>