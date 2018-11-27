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

        $Ingrediente = new Ingrediente();
        $ingredientes = $Ingrediente->listarIngredientes();

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

            //$rutaImagen = 'public/img/'.$nombreImagen;

            //Instancia el modelo de Ingrediente
            $Ingrediente = new Ingrediente();
            // Se ejecuta el metodo que agrega un nuevo ingrediente
            $Ingrediente->agregarIngrediente($_POST["nombre"],  $_POST["descripcion"], $urlNueva, $_POST['clasificacion']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'ingredientes');
    }

        /**
     * ACCIÓN: Actualizar ingrediente
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/ingredientes/editarIngrediente
     */
    public function editarIngrediente($idingrediente){
        
        // if we have an id of a song that should be edited
        if (isset($idingrediente)) {
            
            $Clasificacion = new Clasificacion();
            $clasificaciones = $Clasificacion->listarClasificaciones();

            // Instance new Model (Song)
            $Ingrediente = new Ingrediente();

            // do getSong() in model/model.php
            $ingrediente = $Ingrediente->obtenerIngrediente($idingrediente);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($ingrediente === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $song easily
                require APP . 'view/_templates/header.php';
                require APP . 'view/ingredientes/editar.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'ingredientes');
        }
    }

    public function actualizarIngrediente(){
        if(isset($_POST['btnActualizarIngrediente'])){
            $rutaImagen = '';
            if($_FILES['imagen']['name'] == ''){
                $rutaImagen = $_POST['imagenAnterior'];
            } else {
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
    
                //$rutaImagen = 'public/img/'.$nombreImagen;
            }

            $Ingrediente = new Ingrediente();
            
            $Ingrediente->actualizarIngrediente($_POST['idingrediente'], $_POST['nombre'], $_POST['descripcion'], $urlNueva, $_POST['clasificacion']);
        }

        header('location: ' . URL . 'ingredientes');
    }
}
