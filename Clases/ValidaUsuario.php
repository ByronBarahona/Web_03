<?php
require ("Clases/Conexion.php");
session_start();
Class Autenticar{
    private $user;
    private $clave;
    private $perfil;
    

    public function __construct($user,$clave, $perfil){
        $this->user = $user;
        $this->clave = $clave;
        $this->perfil = $perfil;
    }

    public function Validar(){
        $conexion = new Conexion();
        $conexion->Conecta();
        
        $consulta = "SELECT * FROM usuario WHERE usr_log = '$this->user' AND usr_pass = '$this->clave' AND perfil = '$this->perfil'";
        
        $resultado = $conexion->Ejecuta($consulta);

        if ($resultado->num_rows == 1) {
           
            $_SESSION["dd"] = $this->rut;
            header('Location: Panel.php');
        } else {
            header('Location: index.php');
        }

    }

}


?>