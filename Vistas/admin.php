<?php
session_start();

// Verificar si el usuario ha iniciado sesión como admin
if ($_SESSION["user_type"] !== "admin") {
  header("Location: login.php");
  exit;
}

// Conexión a la base de datos

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
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
    <h1>Panel de Administración</h1>

    <h2>Agregar Producto</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="action" value="Agregar">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="descripcion">Descripción:</label>
      <input type="text" id="descripcion" name="descripcion" required>

      <!-- Resto de atributos... -->

      <input type="submit" value="Agregar">
    </form>

    <h2>Editar/Eliminar Productos</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["nombre"] . "</td>";
          echo "<td>" . $row["descripcion"] . "</td>";
          echo "<td>";
          echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
          echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
          echo "<input type='hidden' name='action' value='Editar'>";
          echo "<input type='submit' value='Editar'>";
          echo "</form>";
          echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
          echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
          echo "<input type='hidden' name='action' value='Eliminar'>";
          echo "<input type='submit' value='Eliminar'>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No se encontraron productos.</td></tr>";
      }
      ?>
    </table>
  </main>
  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
