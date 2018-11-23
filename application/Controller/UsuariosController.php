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
       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * ACCIÓN: agregarUsuario
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/usuarios/agregarUsuario
     */
    public function agregarUsuario()
    {
        // Si llegan datos por POST para crear un nuevo usuario
        if (isset($_POST["btnAgregarUsuario"])) {
            //Instancia el modelo de Usuario
            $Song = new Usuario();
            // Se ejecuta el metodo que agrega un nuevo usuario
            $Song->agregarUsuario($_POST["cedula"], $_POST["nombre"],  $_POST["email"], $_POST["usuario"], $_POST["password"]);
        }
    }
}
