<?php
session_start();

// Verificar si el usuario ha iniciado sesión como admin
if ($_SESSION["user_type"] !== "admin") {
  header("Location: login.php");
  exit;
}

// Aquí puedes realizar las operaciones CRUD y mostrar los paneles de administración
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
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
    <h1>Panel de Administración</h1>
    <p>Aquí puedes realizar las operaciones CRUD de productos.</p>
  </main>
  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
