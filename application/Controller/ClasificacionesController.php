<?php

/**
 * Class ClasificacionesController
 */

namespace Mini\Controller;

use Mini\Model\Clasificacion;

class ClasificacionesController
{
    /**
     * Método que se carga inicialmente al ingresar a la ruta de http://localhost/mis-recetas/clasificaciones
     */
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

        // Al finalizar la petición se redirecciona al inicio de las clasificiones : http://localhost/mis-recetas/clasificaciones
        header('location: ' . URL . 'clasificaciones');
    }

    /**
     * ACCIÓN: Editar la clasificación
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/clasificaciones/editarClasificacion
     */
    public function editarClasificacion($idclasificacion){
        
        // Se valida si se encuentra un clasificación por editar
        if (isset($idclasificacion)) {
            // Instancia del modelo de Clasificación
            $Clasificacion = new Clasificacion();
            //Se obtiene la clasificación a editar
            $clasificacion = $Clasificacion->obtenerClasificacion($idclasificacion);

            // Si no se encontró la clasificación, entonces habría devuelto falso, y necesitamos mostrar la página de error
            if ($clasificacion === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // Se cargan las vistas para editar la clasificación
                require APP . 'view/_templates/header.php';
                require APP . 'view/clasificaciones/editar.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // Al finalizar la petición se redirecciona al inicio de las clasificiones : http://localhost/mis-recetas/clasificaciones
            header('location: ' . URL . 'clasificaciones');
        }
    }

    /**
     * ACTION: Actualizar una clasificación
     */
    public function actualizarClasificacion()
    {
        // Se pregunta si tenemos datos POST para actualizar una clasificación
        if (isset($_POST["btnActualizarClasificacion"])) {
            // Instancia del modelo Clasificación
            $Clasificacion = new Clasificacion();
            // Se ejecuta el método encargado de realizar la actualización en base de datos
            $Clasificacion->actualizarClasificacion($_POST["idclasificacion"], $_POST["nombre"],  $_POST["descripcion"]);
        }
        // Al finalizar la petición se redirecciona al inicio de las clasificiones : http://localhost/mis-recetas/clasificaciones
        header('location: ' . URL . 'clasificaciones');
    }
}
