<?php
require_once __DIR__ . '/../config/Conexion.php';

class TipoArticulo
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO tipo_articulos (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE tipo_articulos SET nombre = ? WHERE categoria_id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM tipo_articulos WHERE categoria_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM tipo_articulos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT categoria_id AS id, nombre FROM tipo_articulos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE tipo_articulos SET is_active = 0 WHERE categoria_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE tipo_articulos SET is_active = 1 WHERE categoria_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
