<?php

/**
 * Clase Modelo Clasificacion
**/

namespace Mini\Model;

use Mini\Core\Model;

class Clasificacion extends Model
{
    /**
     * Agregar una clasificacion a la base de datos
     * @param string $nombre         Nombre
     * @param string $descripcion    Descripcion
     */
    public function agregarClasificacion($nombre, $descripcion)
    {
        $sql = "INSERT INTO clasificacion (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $nombre, ':descripcion' => $descripcion);
        $query->execute($parameters);
    }

    /**
     * Listar todas las clasificaciones
     */
    public function listarClasificaciones(){
        $sql = "SELECT * FROM clasificacion";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Listar clasificacion
     * @param string $idclasificacion   ID de la clasificación
     */
    public function obtenerClasificacion($idclasificacion){
        $sql = "SELECT * FROM clasificacion WHERE idclasificacion = :idclasificacion LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idclasificacion' => $idclasificacion);
        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Actualizar clasificación en base de datos
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param int    $idclasificacion  Id de la clasifiación
     * @param string $nombre           Nombre
     * @param string $descripcion      Descripción
     */
    public function actualizarClasificacion($idclasificacion, $nombre, $descripcion)
    {
        $sql = "UPDATE clasificacion SET nombre = :nombre, descripcion = :descripcion WHERE idclasificacion = :idclasificacion";
        $query = $this->db->prepare($sql);
        $parameters = array(':nombre' => $nombre, ':descripcion' => $descripcion, ':idclasificacion' => $idclasificacion);
        $query->execute($parameters);
    }
}
