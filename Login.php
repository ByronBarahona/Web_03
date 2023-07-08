<?php
session_start();

// Verificar si ya se ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Si ya se ha iniciado sesión, redirigir al panel correspondiente
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin_panel.php');
        exit;
    } elseif ($_SESSION['role'] === 'vendedor') {
        header('Location: vendedor_panel.php');
        exit;
    }
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Realizar la validación de las credenciales con los registros de la base de datos
    // Aquí deberías tener tu lógica para verificar las credenciales en la tabla 'Usuario'

    // Ejemplo básico de verificación (usuario: admin, contraseña: admin123)
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        // Inicio de sesión exitoso para el rol de administrador
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = 'admin';
        header('Location: admin_panel.php');
        exit;
    } elseif ($username === 'vendedor' && $password === 'vendedor123') {
        // Inicio de sesión exitoso para el rol de vendedor
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = 'vendedor';
        header('Location: vendedor_panel.php');
        exit;
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $error_message = 'Usuario o contraseña incorrectos';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Agrega aquí tus enlaces a archivos CSS -->
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>