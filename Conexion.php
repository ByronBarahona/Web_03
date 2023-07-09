<?php
$servername = "localhost";  // Cambia esto si tu servidor de base de datos está en otro lugar
$username = "root";  // Reemplaza con tu nombre de usuario de la base de datos
$password = "root";  // Reemplaza con tu contraseña de la base de datos
$dbname = "TiendaMM";  // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

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

// Cerrar la conexión
$conn->close();
?>

