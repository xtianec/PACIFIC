<?php
require_once __DIR__ . '/../config/Conexion.php';

class Linea
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO linea (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE linea SET nombre = ? WHERE id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM linea WHERE id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM linea ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT id, nombre FROM linea ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE linea SET is_active = 0 WHERE id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE linea SET is_active = 1 WHERE id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
