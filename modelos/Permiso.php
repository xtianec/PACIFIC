<?php
require_once __DIR__ . '/../config/Conexion.php';

class Permiso
{
    public function insertar($modulo_id, $accion)
    {
        $modulo_id = limpiarCadena($modulo_id);
        $accion    = limpiarCadena($accion);
        $sql = "INSERT INTO permisos (modulo_id, accion) VALUES (?, ?)";
        return ejecutarConsulta($sql, [$modulo_id, $accion]);
    }

    public function editar($id, $modulo_id, $accion)
    {
        $id        = limpiarCadena($id);
        $modulo_id = limpiarCadena($modulo_id);
        $accion    = limpiarCadena($accion);
        $sql = "UPDATE permisos SET modulo_id = ?, accion = ? WHERE permiso_id = ?";
        return ejecutarConsulta($sql, [$modulo_id, $accion, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM permisos WHERE permiso_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = <<<SQL
SELECT p.permiso_id AS id, m.nombre AS modulo, p.accion
FROM permisos p
JOIN modulos m ON p.modulo_id = m.modulo_id
ORDER BY m.nombre, p.accion
SQL;
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT permiso_id AS id, accion FROM permisos ORDER BY accion";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE permisos SET is_active = 0 WHERE permiso_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE permisos SET is_active = 1 WHERE permiso_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
