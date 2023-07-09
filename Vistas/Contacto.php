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
        <li><a href="Index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Contacto</h1>
    <form action="enviar.php" method="POST">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" required></textarea><br>

      <input type="submit" value="Enviar">
    </form>
  </main>
  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
