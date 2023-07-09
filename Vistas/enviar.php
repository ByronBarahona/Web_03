<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $mensaje = $_POST["mensaje"];

  // Aquí puedes realizar acciones con los datos recibidos, como enviar un correo electrónico, almacenarlos en la base de datos, etc.

  // Ejemplo de envío de correo electrónico
  $destinatario = "tudirecciondecorreo@example.com";
  $asunto = "Mensaje de contacto desde la tienda M&M";
  $contenido = "Nombre: " . $nombre . "\n";
  $contenido .= "Email: " . $email . "\n";
  $contenido .= "Mensaje: " . $mensaje;

  // Envío del correo
  mail($destinatario, $asunto, $contenido);

  // Respuesta de confirmación
  $respuesta = "¡Gracias por contactarnos! Tu mensaje ha sido enviado.";

  // Puedes redireccionar al usuario a una página de confirmación o mostrar un mensaje en la misma página
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contacto - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Contacto</h1>
    <?php if (isset($respuesta)) { ?>
      <p><?php echo $respuesta; ?></p>
    <?php } else { ?>
      <form action="enviar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" required></textarea><br>

        <input type="submit" value="Enviar">
      </form>
    <?php } ?>
  </main>
  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
