<?php

/**
 * Clase Modelo Receta
**/

namespace Mini\Model;

use Mini\Core\Model;

class Receta extends Model
{
    /**
     * Agregar una receta a la base de datos
     * @param string $nombre         Nombre de la receta
     */
    public function agregarReceta($idusuario, $nombre)
    {
        $sql = "INSERT INTO receta (idusuario, nombre) VALUES (:idusuario, :nombre)";
        $query = $this->db->prepare($sql);
        $parameters = array(':idusuario' => $idusuario, ':nombre' => $nombre);
        $query->execute($parameters);
    }

    /**
     * Consultar la última receta añadida por el usuario
     */
    public function consultarUltimaReceta(){
        $sql = "SELECT receta.idreceta, receta.nombre, receta.fecha FROM receta ORDER BY receta.fecha DESC LIMIT 1;";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Realizar el registro en la tabla detalle de la receta y el ingrediente, se asocia el ingrediente que selecciono
     * el usuario a la receta junto con la cantidad que agrego.
     */
    public function registrarDetalleRecetaIngrediente($idreceta, $idingrediente, $cantidad){
        $sql = "INSERT INTO detalle_receta_ingrediente (id_receta, id_ingrediente, cantidad) VALUES (:idreceta, :idingrediente, :cantidad)";
        $query = $this->db->prepare($sql);
        $parameters = array(':idreceta' => $idreceta, ':idingrediente' => $idingrediente, ':cantidad' => $cantidad);
        $query->execute($parameters);
    }

    /**
     * Listar las recetas del usuario
     */
    public function listarRecetas(){
        $idusuario = $_SESSION['usuario'];
        $sql = "SELECT
            receta.nombre AS nombre_receta,
            ing.nombre AS nombre_ingrediente,
            de_ing.cantidad
        FROM
            receta
        JOIN detalle_receta_ingrediente de_ing ON de_ing.id_receta = receta.idreceta
        JOIN ingrediente ing ON ing.idingrediente = de_ing.id_ingrediente
        WHERE
            receta.idusuario = $idusuario";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
