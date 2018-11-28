<?php

/**
 * Class RecetasController
 */

namespace Mini\Controller;

use Mini\Model\Receta;
use Mini\Model\Ingrediente;

class RecetasController
{
    /**
     * Método que se ejecuta inicialmente al ingresar al módulo de Recetas : http://localhost/mis-recetas/recetas
     */
    public function index()
    {
        $Ingrediente = new Ingrediente();
        $ingredientes = $Ingrediente->listarIngredientes();
        $Receta = new Receta();
        $recetas = $Receta->listarRecetas();

       //Carga de las vistas
        require APP . 'view/_templates/header.php';
        require APP . 'view/recetas/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Agregar una nueva receta
     */
    public function agregarReceta(){
        if(isset($_POST['btnRegistrarReceta'])){
            $Receta = new Receta();
            $Receta->agregarReceta($_SESSION['usuario'], $_POST['nombre']);
        }

        header('location: ' . URL . 'recetas/ingredientes');
    }

    /**
     * Se consultan los ingredientes para agregar a las recetas : http://localhost/mis-recetas/recetas/ingredientes
     */
    public function ingredientes(){
        $Ingrediente = new Ingrediente();
        $ingredientes = $Ingrediente->listarIngredientes();

        $Receta = new Receta();
        $receta = $Receta->consultarUltimaReceta();

        // Carga de las vistas
        require APP . 'view/_templates/header.php';
        require APP . 'view/recetas/seleccionarIngredientes.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Registrar un nuevo ingrediente a la receta
     */
    public function registrarIngredientes(){
        if(isset($_POST['idreceta']) && isset($_POST['idingrediente']) && isset($_POST['cantidad'])){
            $Receta = new Receta();
            $receta = $Receta->registrarDetalleRecetaIngrediente($_POST['idreceta'], $_POST['idingrediente'], $_POST['cantidad']);
        }
        
        echo json_encode($receta);
    }
}
