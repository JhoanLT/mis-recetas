<?php

/**
 * Class UsuariosController
 */

namespace Mini\Controller;

use Mini\Model\Usuario;

class UsuariosController
{
    /**
     * Método que se encarga de cargar la vista para el registro de usuarios  :http://localhost/mis-recetas/usuarios
     */
    public function index()
    {
        //Se limpia la variable que almacena el rol del usuario (Administrador - Usuario)
        unset($_SESSION["rol"]);

       // Carga de las vistas
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACCIÓN: Inicio de sesión del usuario
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/usuarios/login
     */
    public function login(){

        //Se limpian las variables de session
        unset($_SESSION["rol"]);
        unset($_SESSION["login"]);
        unset($_SESSION["usuario"]);

        //Se pregunta si existen datos por POST
        if(isset($_POST["btnLogin"])){
            $Usuario = new Usuario();

            //Se consulta por usuario y contraseña, donde deben de conincidir ambas
            $usuario = $Usuario->obtenerUsuario($_POST["usuario"], md5($_POST["password"]));

            if($usuario == false){
                //Si es false es que no se encontro el usuario en la base de datos
            }else{
                //Si se encontro el usuario se crean las variables de session con los datos del usuario
                //Estas variables se podran utilizar en toda la aplicación siempre y cuando haya una session abierta
                $_SESSION["rol"]=$usuario->fk_rol_idrol;
                $_SESSION["login"]=true;
                $_SESSION["usuario"]=$usuario->idusuario;
                header('location: ' . URL . 'home/bienvenida');
            }
        }

        //Carga de las vistas del login
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
