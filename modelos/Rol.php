<?php
require_once __DIR__ . '/../config/Conexion.php';

class Rol
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE roles SET nombre = ? WHERE rol_id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM roles WHERE rol_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM roles ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT rol_id AS id, nombre FROM roles ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE roles SET is_active = 0 WHERE rol_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE roles SET is_active = 1 WHERE rol_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
