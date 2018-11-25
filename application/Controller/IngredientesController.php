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

use Mini\Model\Ingrediente;
use Mini\Model\Clasificacion;

class IngredientesController
{
    public function index()
    {
        $Clasificacion = new Clasificacion();
        $clasificaciones = $Clasificacion->listarClasificaciones();

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/ingredientes/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * ACCIÓN: Agregar un nuevo ingrediente
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/ingredientes/agregarIngrediente
     */
    public function agregarIngrediente()
    {
        // Si llegan datos por POST para crear un nuevo ingrediente
        if (isset($_POST["btnRegistarIngrediente"])) {
            $nombreImagen = $_FILES['imagen']['name'];
            $tmpImagen = $_FILES['imagen']['tmp_name'];
            $extImagen = pathinfo($nombreImagen);
            $ext = ["png", "gif", "jpg", "jpeg"];
            $urlNueva = "../public/img/".$nombreImagen;

            if(is_uploaded_file($tmpImagen)){
                if(array_search($extImagen['extension'], $ext)){
                    copy($_FILES['imagen']['tmp_name'], $urlNueva);
                }
            }

            $rutaImagen = 'public/img/'.$nombreImagen;

            //Instancia el modelo de Ingrediente
            $Ingrediente = new Ingrediente();
            // Se ejecuta el metodo que agrega un nuevo ingrediente
            $Ingrediente->agregarIngrediente($_POST["nombre"],  $_POST["descripcion"], $rutaImagen, $_POST['clasificacion']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'ingredientes');
    }
}
