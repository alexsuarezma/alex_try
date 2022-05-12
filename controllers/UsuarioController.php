<?php
require_once('models/Usuario.php');

class UsuarioController
{
    public function index(){
        require_once('views/usuario/index.php');
    }

    public function registro(){
        require_once('views/usuario/registrar.php');
    }

    public function save(){
        try {
            $usuario = new Usuario();
            
            if(isset($_POST))
            {
                $nombre_usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : false;
                $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : false;

                if($nombre_usuario && $contrasena){
                    $usuario->db->beginTransaction();

                    $usuario->setNombreUsuario($nombre_usuario);
                    $usuario->setContrasena($contrasena);

                    $usuario->save();
                    
                    $_SESSION['register'] = $usuario->result ? 'completado' : throw new Exception('algo fallo');

                    $usuario->db->commit();
                }else
                {
                    throw new Exception('Los datos estan incompletos');
                }
            }
        } 
        catch (\Exception $err) 
        {
            $usuario->db->rollBack();
            $_SESSION['register'] = $err;
        }
        finally
        {
            $usuario->db = null;
        }

        header('Location: '.base_url.'usuario/registro');
    }
}