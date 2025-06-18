<?php
require_once __DIR__ . '/../config/Conexion.php';

class EstadoCotizacion
{
    public function insertar($descripcion)
    {
        $descripcion = limpiarCadena($descripcion);
        $sql = "INSERT INTO estado_cotizacion (descripcion) VALUES (?)";
        return ejecutarConsulta($sql, [$descripcion]);
    }

    public function editar($id, $descripcion)
    {
        $id          = limpiarCadena($id);
        $descripcion = limpiarCadena($descripcion);
        $sql = "UPDATE estado_cotizacion SET descripcion = ? WHERE estado_cot_id = ?";
        return ejecutarConsulta($sql, [$descripcion, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM estado_cotizacion WHERE estado_cot_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM estado_cotizacion ORDER BY descripcion";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT estado_cot_id AS id, descripcion FROM estado_cotizacion ORDER BY descripcion";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE estado_cotizacion SET is_active = 0 WHERE estado_cot_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE estado_cotizacion SET is_active = 1 WHERE estado_cot_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
