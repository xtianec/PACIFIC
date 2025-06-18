<?php
require_once __DIR__ . '/../config/Conexion.php';

class Usuario
{
    public function insertar($username, $passwordHash, $estado = 1)
    {
        $sql = "INSERT INTO usuario (username, password, estado) VALUES (?, ?, ?)";
        return ejecutarConsulta($sql, [$username, $passwordHash, $estado]);
    }

    public function editar($id, $username, $estado)
    {
        $sql = "UPDATE usuario SET username = ?, estado = ? WHERE id = ?";
        return ejecutarConsulta($sql, [$username, $estado, $id]);
    }

    /*** Este es el que usa tu controlador cuando cambias contraseña ***/
    public function editarConPass($id, $username, $passwordHash, $estado)
    {
        $sql = "UPDATE usuario SET username = ?, password = ?, estado = ? WHERE id = ?";
        return ejecutarConsulta($sql, [$username, $passwordHash, $estado, $id]);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE usuario SET estado = 0 WHERE id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE usuario SET estado = 1 WHERE id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function mostrar($id)
    {
        $sql = "SELECT id, username, estado FROM usuario WHERE id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    /** Listado completo para DataTables **/
    public function listar()
    {
        $sql = "SELECT id, username, estado FROM usuario";
        return ejecutarConsulta($sql);
    }

    /** Para llenar selects de usuarios activos **/
    public function select()
    {
        $sql = "SELECT id, username FROM usuario WHERE estado = 1";
        return ejecutarConsulta($sql);
    }
}
