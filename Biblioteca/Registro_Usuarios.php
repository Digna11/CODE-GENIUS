<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
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
    <h2>Registro de Usuario</h2>
    </tr>
    </td>
    <tr>
    <td>
    <form action="Registro_Usuarios.php" method="post">
    <tr>
    <td>
        <label for="ID">ID:</label>
        <input type="text" id="ID" name="ID" required class="center-input"><br><br>
    </tr>
    </td>
    <tr>
    <td>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required class="center-input"><br><br>
</tr>
</td> 
     <tr>
     <td>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required class="center-input"><br><br>
    </tr>
    </td> 
    <tr>
    <td>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required class="center-input"><br><br>
    </tr>
    </td>
    <tr>
    <td>
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" class="center-input"><br><br>

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
$ID = $_POST['ID'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


$connection = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

// Crear la consulta SQL para insertar el usuario en la tabla usuarios
$sql = "INSERT INTO usuarios (ID, nombre, apellido, email, telefono)
VALUES ('$ID', '$nombre', '$apellido', '$email', '$telefono')";

// Ejecutar la consulta SQL
if ($connection->query($sql) === TRUE) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error al registrar el usuario: " . $connection->error;
}

// Cerrar la conexión
$connection->close();
?>