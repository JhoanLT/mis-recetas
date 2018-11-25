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

use Mini\Model\Clasificacion;

class ClasificacionesController
{
    public function index()
    {
        $Clasificacion = new Clasificacion();

        $clasificaciones = $Clasificacion->listarClasificaciones();

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/clasificaciones/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * ACCIÓN: Agregar una nueva clasificación
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/clasificaciones/agregarClasificacion
     */
    public function agregarClasificacion()
    {
        // Si llegan datos por POST para crear una nueva clasificacion
        if (isset($_POST["btnClasificacion"])) {
            //Instancia el modelo de Clasificacion
            $Clasificacion = new Clasificacion();
            // Se ejecuta el metodo que agrega una nueva clasificación
            $Clasificacion->agregarClasificacion($_POST["nombre"],  $_POST["descripcion"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'clasificaciones');
    }

    /**
     * ACCIÓN: Actualizar clasificación
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/clasificaciones/editarClasificacion
     */
    public function editarClasificacion($idclasificacion){
        
        // if we have an id of a song that should be edited
        if (isset($idclasificacion)) {
            // Instance new Model (Song)
            $Clasificacion = new Clasificacion();
            // do getSong() in model/model.php
            $clasificacion = $Clasificacion->obtenerClasificacion($idclasificacion);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($clasificacion === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $song easily
                require APP . 'view/_templates/header.php';
                require APP . 'view/clasificaciones/editar.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'clasificaciones');
        }
    }

    /**
     * ACTION: Actualizar una clasificación
     * This method handles what happens when you move to http://yourproject/songs/updatesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function actualizarClasificacion()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["btnActualizarClasificacion"])) {
            // Instance new Model (Song)
            $Clasificacion = new Clasificacion();
            // do updateSong() from model/model.php
            $Clasificacion->actualizarClasificacion($_POST["idclasificacion"], $_POST["nombre"],  $_POST["descripcion"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'clasificaciones');
    }
}
