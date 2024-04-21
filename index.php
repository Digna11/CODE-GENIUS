<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de registro</title>
    <link rel="stylesheet" href="style.css">

    
  </head>
  <body>
    <h1>Formulario de registro</h1>
    <form action="registro.php" name="" method="POST">
      <table border="0" align="center">
        <tr>
          <td>
           Id:
          </td>
          <td>
            <label for="Id"></label>
            <input type="text" name="Id" id="Id" required  />
          </td>
        </tr>
        <tr>
          <td>
            Nombre:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="nombre" id="nombre" required  />
          </td>
        </tr>
        <tr>
          <td>
            Precio:
          </td>
          <td>
            <label for="precio"></label>
            <input type="precio" name="precio" id="precio"  required />
          </td>
        </tr>
        <tr>
         <td>
            Cantidad:
        </td>
        <td>
            <label for="cantidad"></label>
            <input type="cantidad" name="cantidad" id="precio" required />
            </td>
        </tr>

        <!--<tr>
          <td>
            Repetir contraseña:
          </td>
          <td>
            <label for="rep_pasword"></label>
            <input type="pasword" name="rep_contraseña" id="rep_pasword"  required />
          </td>
        </tr>-->
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">
            <input
              type="submit"
              name="enviar"
              id="enviar"
              value="Registrarse"
            />
          </td>
          <td align="center">
            <input type="reset" name="borrar" id="borrar" value="Restablecer" />
          </td>
        </tr>
        </table>
    </form>

    <br>
    <table border="0" align="center">
    <form action="buscar.php" name="buscar" method="POST">
  
    <tr>
     <br>
          <td>
            
          <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
           <label>Nombre del producto:</label>
           
          <input type="text" name="nombre_producto">
          <input type="submit" value="Buscar">
</table>
        </form>
        
          </td>
        </tr>
        <table border="0" align="center">
          <tr>
          <td>
           Vender:
          </td>
          <td>
          
          <form method="post" action="Vender.php">
     
          <label>ID del producto:</label>
          <input type="number" name="id_producto">
          <br>
          <label>Cantidad a vender:</label>
          <input type="number" name="cantidad_vendida" min="1">
          <br>
          <label>Precio unitario:</label>
          <input type="number" name="precio_unitario" step="0.01">
          <br>
          <input type="submit" value="Vender">
        </table>
        </form>
          </td>   
        
   
    <table border="0" align="center">
            <tr>
            <td>
          <form method="post" action="Total.php">
          <input type="submit" value="Total">
          </form>
          <br>
          <tr>
            <td>
          <form method="post" action="cierre_sesion.php">
          <input type="submit" value="Salir">
        </tr>
        </td>
      </table>
    </form>
  </body>
</html>