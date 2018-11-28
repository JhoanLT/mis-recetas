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
        $sql = "INSERT INTO usuario (cedula, nombre, email, usuario, password, fk_rol_idrol) VALUES (:cedula, :nombre, :email, :usuario, :password, :fk_rol_idrol)";
        $query = $this->db->prepare($sql);
        $parameters = array(':cedula' => $cedula, ':nombre' => $nombre, ':email' => $email, ':usuario' => $usuario, ':password' => md5($password), ':fk_rol_idrol' => 2);
        $query->execute($parameters);
    }
    
    /**
     * Listar usuario por ID
     * @param string $usuario   Usuario
     * @param string $password  Contraseña
     */
    public function obtenerUsuario($usuario, $password){
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND password = :password LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':usuario' => $usuario, ':password' => $password);
        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Listar todos los usuarios
     */
    public function listarUsuarios(){
        $sql = "SELECT * FROM usuario";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Eliminar un usuario
     * @param int $idUsuario ID del usuario
     */
    public function eliminarUsuario($idUsuario){
        $sql = "DELETE FROM usuario WHERE idusuario = :idUsuario";
        $query = $this->db->prepare($sql);
        $parameters = array(':idUsuario' => $idUsuario);

        $query->execute($parameters);
    }
}
