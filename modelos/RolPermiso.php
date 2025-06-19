<?php
require_once __DIR__ . '/../config/Conexion.php';

class RolPermiso
{
    public function insertar($rol_id, $permiso_id)
    {
        $sql = "INSERT INTO rol_permiso (rol_id, permiso_id) VALUES (?, ?)";
        return ejecutarConsulta($sql, [$rol_id, $permiso_id]);
    }

    public function eliminar($rol_id, $permiso_id)
    {
        $sql = "DELETE FROM rol_permiso WHERE rol_id = ? AND permiso_id = ?";
        return ejecutarConsulta($sql, [$rol_id, $permiso_id]);
    }

    /** Listar permisos asignados a un rol **/
    public function listarPorRol($rol_id)
    {
        $sql = "SELECT rp.permiso_id, m.nombre AS modulo, p.accion
                  FROM rol_permiso rp
                  JOIN permiso p ON rp.permiso_id = p.id
                  JOIN modulo m  ON p.modulo_id  = m.id
                 WHERE rp.rol_id = ?";
        return ejecutarConsulta($sql, [$rol_id]);
    }

    /** Para poblar el select de permisos **/
    public function select()
    {
        $sql = "SELECT p.id, m.nombre AS modulo, p.accion
                  FROM permiso p
                  JOIN modulo m ON p.modulo_id = m.id";
        return ejecutarConsulta($sql);
    }
}
