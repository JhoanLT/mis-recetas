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
}
