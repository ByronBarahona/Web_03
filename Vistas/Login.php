<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
  <title>Login - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body>

  <header>

    <nav>

      <ul>

        <li><a href="Index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="./Login.php">Login</a></li>

      </ul>
      
    </nav>

  </header>

  <main>

    <h1>Login</h1>

    <?php if (isset($error_message)) { ?>

      <p><?php echo $error_message; ?></p>

    <?php } ?>

    <form method="POST" action="inicia.php">

      <label for="username">Usuario:</label>
      <input type="text" id="username" name="username" required><br>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required><br>

      <input type="submit" value="Ingresar">

    </form>

  </main>

  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
