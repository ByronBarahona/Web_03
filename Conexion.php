<?php
$servername = "localhost";  // Cambia esto si tu servidor de base de datos está en otro lugar
$username = "root";  // Reemplaza con tu nombre de usuario de la base de datos
$password = "root";  // Reemplaza con tu contraseña de la base de datos
$dbname = "tiendamm";  // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Aquí puedes realizar operaciones con la base de datos

// Cerrar la conexión
$conn->close();
?>

