<?php
require_once __DIR__ . '/../config/Conexion.php';

class UnidadMedida
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO unidad_medida (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE unidad_medida SET nombre = ? WHERE unidad_id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM unidad_medida WHERE unidad_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM unidad_medida ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT unidad_id AS id, nombre FROM unidad_medida ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE unidad_medida SET is_active = 0 WHERE unidad_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE unidad_medida SET is_active = 1 WHERE unidad_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
