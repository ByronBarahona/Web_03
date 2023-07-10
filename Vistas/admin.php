<?php
session_start();
//include("Clases/crud_admin.php");
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TiendaMM";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
// Operaciones CRUD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["action"] == "Agregar") {
    // Procesar formulario de agregar producto
    $id_prod = $_POST["id_producto"];
    $descripcion = $_POST["descripcion"];
    $usuario = $_POST["usuario"];
    $fecha_ing = $_POST["fec_creacion"];
    $valor = $_POST["valor"];
    // Resto de atributos...

    // Ejecutar consulta SQL para insertar el producto en la tabla correspondiente
    $sql = "INSERT INTO Producto (id_producto,descripcion, usuario, fec_creacion,valor) VALUES ('$id_prod', '$descripcion', '$usuario','$fecha_ing', '$valor')";
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
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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


    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
      Agregar Producto
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <input type="hidden" name="action" value="Agregar">
      <label for="cod_Prod">Codigo Producto:</label>
</br>
      <input type="number" id="cod_Prod" name="cod_Prod" required>
      </br>

      <label for="descripcion">Descripción:</label>

      <input type="text" id="descripcion" name="descripcion" required>

      <label for="usuario">Usuario</label>
      </br>
      <input type="number" id="usuario" name="usuario" required>
      </br>

      <label for="fec_creacion">Fecha Ingreso:</label>
</br>
      <input type="date"id="fec_creacion" name="fec_creacion" required> 

</br>
      <label for="valor">Valor:</label>
</br>
      <input type="number" id="valor" nmae="valor"required>
</br></br>

      <input type="submit" value="Agregar">
    </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
      Editar/Eliminar Productos
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
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
      </div>
    </div>
  </div>
  </main>
  <footer>
    <p>&copy; 2023 Tienda M&M. Todos los derechos reservados.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
