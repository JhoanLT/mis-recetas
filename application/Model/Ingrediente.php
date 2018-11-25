<?php

/**
 * Clase Modelo Ingrediente
**/

namespace Mini\Model;

use Mini\Core\Model;

class Ingrediente extends Model
{
    /**
     * Agregar un ingrediente a la base de datos
     * @param string $nombre         Nombre
     * @param string $descripcion    Descripción
     * @param string $imagen         Imágen del ingrediente
     */
    public function agregarIngrediente($nombre, $descripcion, $imagen, $clasificacion)
    {
        $sql = "INSERT INTO ingrediente (nombre, descripcion, imagen, clasificacion) VALUES (:nombre, :descripcion, :imagen, :clasificacion)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $nombre, ':descripcion' => $descripcion, ':imagen' => $imagen, ':clasificacion' => $clasificacion);
        $query->execute($parameters);
    }
}
