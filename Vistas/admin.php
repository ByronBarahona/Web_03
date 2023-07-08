<?php
session_start();

// Verificar si el usuario ha iniciado sesión como admin
if ($_SESSION["user_type"] !== "admin") {
  header("Location: login.php");
  exit;
}

// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tiendamm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Operaciones CRUD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["action"] == "Agregar") {
    // Procesar formulario de agregar producto
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    // Resto de atributos...

    // Ejecutar consulta SQL para insertar el producto en la tabla correspondiente
    $sql = "INSERT INTO Producto (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    // Agregar los demás atributos a la consulta...

    if ($conn->query($sql) === TRUE) {
      echo "Producto agregado exitosamente";
    } else {
      echo "Error al agregar el producto: " . $conn->error;
    }
  } elseif ($_POST["action"] == "Editar") {
    // Procesar formulario de editar producto
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    // Resto de atributos...

    // Ejecutar consulta SQL para actualizar el producto en la tabla correspondiente
    $sql = "UPDATE Producto SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
    // Actualizar los demás atributos en la consulta...

    if ($conn->query($sql) === TRUE) {
      echo "Producto actualizado exitosamente";
    } else {
      echo "Error al actualizar el producto: " . $conn->error;
    }
  } elseif ($_POST["action"] == "Eliminar") {
    // Procesar formulario de eliminar producto
    $id = $_POST["id"];

    // Ejecutar consulta SQL para eliminar el producto de la tabla correspondiente
    $sql = "DELETE FROM Producto WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      echo "Producto eliminado exitosamente";
    } else {
      echo "Error al eliminar el producto: " . $conn->error;
    }
  }
}

// Consulta de productos existentes
$sql = "SELECT * FROM Producto";
$result = $conn->query($sql);

$conn->close();
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
