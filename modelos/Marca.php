<?php
require_once __DIR__ . '/../config/Conexion.php';

class Marca
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO marca (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE marca SET nombre = ? WHERE id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM marca WHERE id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM marca ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT id, nombre FROM marca ORDER BY nombre";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id)
    {
        $sql = "UPDATE marca SET is_active = 0 WHERE id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE marca SET is_active = 1 WHERE id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
