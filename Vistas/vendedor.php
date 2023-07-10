<?php
session_start();

// Verificar si el usuario ha iniciado sesión como vendedor
if ($_SESSION["user_type"] !== "vendedor") {
  header("Location: login.php");
  exit;
}

$vendedor_nombre = $_SESSION["vendedor_nombre"];
?>

<!DOCTYPE html>
<html>

<head>
  <title>Vendedor - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
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
    <h1>Bienvenido, <?php echo $vendedor_nombre; ?></h1>
    <p>Información para vendedores.</p>

    <h3>Consultar productos</h3>
    <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
    <input type="text" placeholder="Buscar..." name="cuadrobusqueda">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>
  </main>

  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
