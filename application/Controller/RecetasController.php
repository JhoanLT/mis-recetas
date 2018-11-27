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

use Mini\Model\Receta;
use Mini\Model\Ingrediente;

class RecetasController
{
    public function index()
    {

        $Ingrediente = new Ingrediente();
        $ingredientes = $Ingrediente->listarIngredientes();
       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/recetas/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function agregarReceta(){
        if(isset($_POST['btnRegistrarReceta'])){
            $Receta = new Receta();
            $Receta->agregarReceta($_POST['nombre']);
        }

        header('location: ' . URL . 'recetas/ingredientes');
    }

    public function ingredientes(){
        $Ingrediente = new Ingrediente();
        $ingredientes = $Ingrediente->listarIngredientes();

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/recetas/seleccionarIngredientes.php';
        require APP . 'view/_templates/footer.php';
    }
}
