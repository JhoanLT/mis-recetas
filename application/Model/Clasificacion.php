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
     * Listar clasificacion por ID
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
     * @param int    $idclasificacion  Id de la clasificación
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
