<?php

Class Conexion{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conexion;


    public function __construct(){//$host, $user, $pass, $db
        require_once "DB_CFG.php";//obtenemos nuestras constantes
        $this->host = host;        
        $this->user = user;        
        $this->pass = pass;        
        $this->db = db;        
    }

    public function Conecta(){
        //Conexion DB
        //POO
        $this->conexion = new mysqli($this->host,$this->user,$this->pass,$this->db);
        //POO
        if($this->conexion->connect_errno){
            die("Conexion Error: (". $this->conexion->connect_errno. ") " . $this->conexion->connect_error);
        }
    }

    public function Desconecta($conexion){
        //Desconexion
        $this->conexion->close();
        //mysqli_close($conexion);
    }

    public function Ejecuta($consulta){
        $result = $this->conexion->query($consulta);
        return $result;
    }
 
}   


?>