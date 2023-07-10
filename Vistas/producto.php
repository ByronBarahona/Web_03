<!DOCTYPE html>
<html>
<head>
  <title>Productos - Tienda M&M</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Productos</h1>
    <div class="filtros">
      <h2>Filtros</h2>
      <!-- Agrega aquí los filtros que necesites (ejemplo: categoría, precio, etc.) -->
      <form action="productos.php" method="GET">
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
          <option value="gomitas">Gomitas</option>
          <option value="chocolates">Chocolates</option>
          <!-- Agrega más opciones de categorías según tus productos -->
        </select>
        <input type="submit" value="Filtrar">
      </form>
    </div>
    <div class="lista-productos">
      <h2>Lista de Productos</h2>
      <?php
      // Conexión a la base de datos (código similar al proporcionado anteriormente)
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "TiendaMM";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Obtener los productos de la base de datos según el filtro (si se seleccionó uno)
      $filtro = isset($_GET["categoria"]) ? $_GET["categoria"] : "";

      $sql = "SELECT * FROM Producto";
      if (!empty($filtro)) {
        $sql .= " WHERE categoria = '$filtro'";
      }

      $result = $conn->query($sql);

      // Mostrar los productos en una lista
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='producto'>";
          echo "<img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "'>";
          echo "<h3>" . $row["nombre"] . "</h3>";
          echo "<p>" . $row["descripcion"] . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p>No se encontraron productos.</p>";
      }

      $conn->close();
      ?>
    </div>
  </main>
  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
