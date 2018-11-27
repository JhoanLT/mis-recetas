<?php

/**
 * Class SongsController
 * This is a demo Controller class.
 *
 * If you want, you can use multiple Models or Controllers.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Usuario;

class UsuariosController
{
    public function index()
    {
        unset($_SESSION["rol"]);
       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACCIÓN: Inicio de sesión del usuario
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/usuarios/login
     */
    public function login(){

        unset($_SESSION["rol"]);
        unset($_SESSION["login"]);
        unset($_SESSION["usuario"]);

        if(isset($_POST["btnLogin"])){
            $Usuario = new Usuario();
            $usuario = $Usuario->obtenerUsuario($_POST["usuario"], md5($_POST["password"]));

            if($usuario == false){

            }else{
                $_SESSION["rol"]=$usuario->fk_rol_idrol;
                $_SESSION["login"]=true;
                $_SESSION["usuario"]=$usuario->idusuario;
                header('location: ' . URL . 'home/bienvenida');
            }
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/login.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * ACCIÓN: Agregar un nuevo usuario
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/usuarios/agregarUsuario
     */
    public function agregarUsuario()
    {
        // Si llegan datos por POST para crear un nuevo usuario
        if (isset($_POST["btnAgregarUsuario"])) {
            //Instancia el modelo de Usuario
            $Usuario = new Usuario();
            // Se ejecuta el metodo que agrega un nuevo usuario
            $Usuario->agregarUsuario($_POST["cedula"], $_POST["nombre"],  $_POST["email"], $_POST["usuario"], $_POST["password"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'usuarios/login');
    }

    /**
     * ACCIÓN: Listar usuarios
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/usuarios/listarUsuarios
     */
    public function listarUsuarios(){

        $Usuario = new Usuario();
        $usuarios = $Usuario->listarUsuarios();

        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/listar.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACCIÓN: Eliminar un usuario
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/usuarios/eliminarUsuario
     */
    public function eliminarUsuario($idUsuario){
        if(isset($idUsuario)){
            $Usuario = new Usuario();
            $Usuario->eliminarUsuario($idUsuario);
        }

        header('location: ' . URL . 'usuarios/listarUsuarios');
    }
}
