<?php

class Usuario
{

    private $id;
    private $nombre_usuario;
    private $contrasena;
    public $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getNombreUsuario(){
        return $this->nombre_usuario;
    }
    
    public function setNombreUsuario($nombre_usuario){
        $this->nombre_usuario = $nombre_usuario;
    }

    public function getContrasena(){
        return password_hash($this->contrasena, PASSWORD_BCRYPT,['cost' => 4]);
    }
    
    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function save()
    {
       $save = $this->db->prepare("INSERT INTO usuarios (nombre_usuario,contrasena) VALUES ('{$this->getNombreUsuario()}','{$this->getContrasena()}')")->execute();

       $this->result = false;
       if($save)
       {
            $this->result = true;
       }

       return $this->result;
    }

    public function login(){
        $result = false;
        $nombre_usuario = $this->getNombreUsuario();
        $password = $this->password;
        $login = $this->db->query("SELECT * FROM usuarios WHERE nombre_usuario='{$nombre_usuario}'");
        if(password_verify($password,$usuario->password)){
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
                $result = $usuario;
            }
        }
        return $result;
    }
}