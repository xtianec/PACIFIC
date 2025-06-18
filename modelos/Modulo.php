<?php
require_once __DIR__ . '/../config/Conexion.php';

class Modulo
{
    public function insertar($nombre, $ruta = null)
    {
        $nombre = limpiarCadena($nombre);
        $ruta   = limpiarCadena($ruta);
        $sql = "INSERT INTO modulos (nombre, ruta) VALUES (?, ?)";
        return ejecutarConsulta($sql, [$nombre, $ruta]);
    }

    public function editar($id, $nombre, $ruta = null)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $ruta   = limpiarCadena($ruta);
        $sql = "UPDATE modulos SET nombre = ?, ruta = ? WHERE modulo_id = ?";
        return ejecutarConsulta($sql, [$nombre, $ruta, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM modulos WHERE modulo_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM modulos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT modulo_id AS id, nombre FROM modulos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

        public function desactivar($id)
    {
        $sql = "UPDATE modulos SET is_active = 0 WHERE modulo_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE modulos SET is_active = 1 WHERE modulo_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
