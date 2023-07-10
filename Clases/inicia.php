<?php
require ("./Conexion.php");
include "./ValidaUsuario.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si los datos están presentes en la solicitud POST
    if (isset($_POST["username"]) && isset($_POST["password"])) {

        // $ValidarUsuario = new Autenticar($user, $clave,$perfil);

        $user = $_POST["username"];
        $clave = $_POST["password"];

        $prf = "SELECT perfil FROM usuarios where usr_log = $user and usr_pass = $clave";
        $Conexion = new Conexion();
        $Conexion->Conecta();
        $resultado = $Conexion->Ejecuta($prf);

        // var_dump("usuario: ".$user);
        // var_dump("password: ".$clave);
        // exit;
        // Aquí puedes realizar las operaciones necesarias con los datos recibidos



        // Ejemplo de uso en la clase Autenticar
        $ValidarUsuario = new Autenticar($user, $clave, $resultado);

        $ValidarUsuario->Validar();

    } else {

        // var_dump($_POST);
        // Los datos no están presentes en la solicitud POST
        echo "Faltan los datos requeridos.";

    }
} else {
    // La solicitud no se realizó utilizando el método POST
    echo "Método de solicitud no válido.";
}

?>