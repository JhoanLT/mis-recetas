<?php

/**
 * Class IngredientesController
 */

namespace Mini\Controller;

use Mini\Model\Ingrediente;
use Mini\Model\Clasificacion;

class IngredientesController
{
    /**
     * Método que se ejecuta inicialmente al ingresar al módulo de Ingredientes : http://localhost/mis-recetas/ingredientes
     */
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

            //En esta parte se trabaja todo lo relacionado a la carga de la imágen
            //Ruta de almacenamiento, extensiones
            $nombreImagen = $_FILES['imagen']['name']; // Se extrae el nombre de la imágen
            $tmpImagen = $_FILES['imagen']['tmp_name'];
            $extImagen = pathinfo($nombreImagen); // Se extrae la extensión de la imágen subida
            $ext = ["png", "gif", "jpg", "jpeg"]; //Array para validar las extensiones
            $urlNueva = "../public/img/".$nombreImagen; // Se general la URL donde se va a guardar la imágen

            //Si hay una imágen cargada
            if(is_uploaded_file($tmpImagen)){
                //Se valida la extensión
                if(array_search($extImagen['extension'], $ext)){
                    //Estando todo correcto se guarda en la ruta especificada
                    copy($_FILES['imagen']['tmp_name'], $urlNueva);
                }
            }

            //$rutaImagen = 'public/img/'.$nombreImagen;

            //Instancia el modelo de Ingrediente
            $Ingrediente = new Ingrediente();
            // Se ejecuta el metodo que agrega un nuevo ingrediente
            $Ingrediente->agregarIngrediente($_POST["nombre"],  $_POST["descripcion"], $urlNueva, $_POST['clasificacion']);
        }

        // Se retorna al inicio del módulo de Ingredientes : http://localhost/mis-recetas/ingredientes
        header('location: ' . URL . 'ingredientes');
    }

    /**
     * ACCIÓN: Actualizar ingrediente
     * Este método se ejecuta en la siguiente ruta http://mis-recetas/ingredientes/editarIngrediente
     */
    public function editarIngrediente($idingrediente){
        
        // Se valida si se encuentra un ingrediente por editard
        if (isset($idingrediente)) {
            
            $Clasificacion = new Clasificacion();
            $clasificaciones = $Clasificacion->listarClasificaciones();

            //Intancia del modelo de Ingrediente
            $Ingrediente = new Ingrediente();

            // Se obtiene el ingrediente a modificar
            $ingrediente = $Ingrediente->obtenerIngrediente($idingrediente);

            // Si no se encontró el ingrediente, entonces habría devuelto falso, y necesitamos mostrar la página de error
            if ($ingrediente === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // Se cargan las vistas para editar un ingrediente : http://localhost/mis-recetas/ingredientes/editarIngrediente/ID
                require APP . 'view/_templates/header.php';
                require APP . 'view/ingredientes/editar.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // Se retorna al inicio del módulo de ingredientes: http://localhost/mis-recetas/ingredientes
            header('location: ' . URL . 'ingredientes');
        }
    }

    /**
     * Actualizar un ingrediente
     */
    public function actualizarIngrediente(){

        //Si existen datos por POST
        if(isset($_POST['btnActualizarIngrediente'])){
            $urlNueva = '';
            //Si el usuario no cargo una nueva imágen, se le deja la que tenia
            if($_FILES['imagen']['name'] == ''){
                $urlNueva = $_POST['imagenAnterior'];
            } else {
                //Si el usuario a cargado una imágen nueva, se realiza otra vez proceso
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
               
            //Instancia del modelo de Ingrediente
            $Ingrediente = new Ingrediente();
            //Se ejecuta el método encargado de realizar la actualización del ingrediente
            $Ingrediente->actualizarIngrediente($_POST['idingrediente'], $_POST['nombre'], $_POST['descripcion'], $urlNueva, $_POST['clasificacion']);
        }

        //Se redirecciona al inicio del módulo de ingredientes  :http://localhost/mis-recetas/ingredientes/
        header('location: ' . URL . 'ingredientes');
    }
}
