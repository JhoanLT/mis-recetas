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
    public function agregarReceta($nombre)
    {
        $sql = "INSERT INTO receta (nombre) VALUES (:nombre)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $nombre);
        $query->execute($parameters);
    }
}
