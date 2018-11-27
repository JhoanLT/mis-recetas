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

    /**
     * Listar todos los ingredientes
     */
    public function listarIngredientes(){
        $sql = "SELECT
                    ingrediente.idingrediente,
                    ingrediente.nombre,
                    ingrediente.descripcion,
                    ingrediente.imagen,
                    c.nombre AS clasificacion
                FROM
                    ingrediente
                JOIN clasificacion c ON ingrediente.clasificacion = c.idclasificacion";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Listar ingrediente
     * @param string $idingrediente   ID del Ingrediente
     */
    public function obtenerIngrediente($idingrediente){
        $sql = "SELECT * FROM ingrediente WHERE idingrediente = :idingrediente LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idingrediente' => $idingrediente);
        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Actualizar ingrediente en base de datos
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param int    $idingrediente    Id del ingrediente
     * @param string $nombre           Nombre
     * @param string $descripcion      Descripción
     * @param string $imagen           Ubicación de la imágen
     * @param int    $clasificacion    Id de la clasificación
     */
    public function actualizarIngrediente($idingrediente, $nombre, $descripcion, $imagen, $clasificacion)
    {
        $sql = "UPDATE ingrediente SET nombre = :nombre, descripcion = :descripcion, imagen = :imagen, clasificacion = :clasificacion WHERE idingrediente = :idingrediente";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $nombre, ':descripcion' => $descripcion, ':idingrediente' => $idingrediente, ':imagen' => $imagen, ':clasificacion' => $clasificacion);
        $query->execute($parameters);
    }
}
