<!DOCTYPE html>
<html>
<head>
    <title>Registro de Libros</title>
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
    <h2>Registro de Libros</h2>
    </tr>
    </td>
    <tr>
    <td>
    <form action="Registro_Libros.php" method="post">
    <tr>
    <td>
        <label for="ID">Id:</label>
        <input type="text" id="ID" name="ID" required  class="center-input"><br><br>
    </tr>
    </td>
    <tr>
    <td>
        <label for="nombre">Nombre del Libro:</label>
        <input type="text" id="nombre" name="nombre" required class="center-input"><br><br>
</tr>
</td> 
     <tr>
     <td>
        <label for="nom_Autor">Autor:</label>
        <input type="text" id="nom_Autor" name="nom_Autor" required class="center-input"><br><br>
    </tr>
    </td> 
    <tr>
    <td>
        <label for="Editorial">Editorial:</label>
        <input type="Editorial" id="Editorial" name="Editorial" required class="center-input"><br><br>
    </tr>
    </td>
    <tr>
    <td>
        <label for="Publicacion">Fecha Publicacion:</label>
        <input type="date" id="Publicacion" name="Publicacion" required class="center-input"><br><br>
    </tr>
    </td>
    <tr>
    <td>
        <label for="paginas">Paginas:</label>
        <input type="text" id="paginas" name="paginas" class="center-input"><br><br>

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
$NombreLibro = $_POST['Nombre del Libro'];
$Autor = $_POST['Autor'];
$Editorial = $_POST['Editorial'];
$Publicacion = $_POST['Publicacion'];


$connection = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

// Crear la consulta SQL para insertar el usuario en la tabla usuarios
$sql = "INSERT INTO libros (ID, Nombre del Libro, Autor, Editorial, Publicacion)
VALUES ('$ID', '$NombreLibro', '$Autor', '$Editorial', '$Publicacion')";

// Ejecutar la consulta SQL
if ($connection->query($sql) === TRUE) {
    echo "Libro registrado exitosamente.";
} else {
    echo "Error al registrar el Libro: " . $connection->error;
}

// Cerrar la conexión
$connection->close();
?>