<?php

/**
 * Clase Modelo Usuario
**/

namespace Mini\Model;

use Mini\Core\Model;

class Usuario extends Model
{
    /**
     * Agregar usuario a la base de datos
     * @param string $cedula   Cedula
     * @param string $nombre   Nombre
     * @param string $email    Email
     * @param string $usuario  Usuario
     * @param string $password Contraseña
     */
    public function agregarUsuario($cedula, $nombre, $email, $usuario, $password)
    {
        $sql = "INSERT INTO usuario (cedula, nombre, email, usuario, password) VALUES (:cedula, :nombre, :email, :usuario, :password)";
        $query = $this->db->prepare($sql);
        $parameters = array(':cedula' => $cedula, ':nombre' => $nombre, ':email' => $email, ':usuario' => $usuario, ':password' => $password);
        $query->execute($parameters);
    }
}
