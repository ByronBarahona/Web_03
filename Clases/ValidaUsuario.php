<?php
require ("./Conexion.php");
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

        $Conexion = new Conexion();
        $Conexion->Conecta();
        
        // $prf = "SELECT perfil FROM usuarios where usr_log = "admin" and usr_pass = "adm123"";
        $consulta = "SELECT * FROM usuarios WHERE usr_log = '$this->user' AND usr_pass = '$this->clave'";

        $resultado = $Conexion->Ejecuta($consulta);

        if ($resultado->num_rows == 1) {
           
            $_SESSION["perfil"] = $this->perfil;
            header('Location: ../Vistas/admin.php');
            die();
            
        } elseif($resultado->num_rows == 1) {

            $_SESSION["perfil"] = $this->perfil;
            header('Location: ../Vistas/vendedor.php');
            die();
        }
        
        else{

            header('location: Login.php');
            die();
        }

    }

}


?>