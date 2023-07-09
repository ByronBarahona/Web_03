<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["usr_log"];
  $password = $_POST["usr_pass"];
  $tip_usr = $_POST["perfil"];

  // Aquí debes realizar la validación de las credenciales
  // Comparar con los datos almacenados en la base de datos

  if ($username == "usr_log" && $password == "usr_pass" && $tip_usr == "perfil") {
    $_SESSION["user_type"] = "admin";
    header("Location: admin.php");
    exit;
  } elseif ($username == "vendedor" && $password == "vendedor123") {
    $_SESSION["user_type"] = "vendedor";
    $_SESSION["vendedor_nombre"] = "Nombre del Vendedor"; // Puedes ajustar esto según tus datos
    header("Location: vendedor.php");
    exit;
  } else {
    $error_message = "Credenciales inválidas. Inténtalo nuevamente.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="./Vistas/Login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
      <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
