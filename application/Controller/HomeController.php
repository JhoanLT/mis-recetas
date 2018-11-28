<?php

/**
 * Class HomeController
 *
 */

namespace Mini\Controller;

class HomeController
{
    /**
     * PAGE: Vista inicial de la aplicación al iniciarla
     */
    public function index()
    {
        // Carga de vistas
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Se cargan las vistas de bienvenida al momento del usuario ingresar en la aplicación
     */
    public function bienvenida()
    {
        // Carga de vistas
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/home.php';
        require APP . 'view/_templates/footer.php';
    }
}
