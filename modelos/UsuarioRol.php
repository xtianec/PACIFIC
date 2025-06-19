<?php
require_once __DIR__ . '/../config/Conexion.php';

class UsuarioRol
{
    public function insertar($usuario_id, $rol_id)
    {
        $sql = "INSERT INTO usuario_rol (usuario_id, rol_id) VALUES (?, ?)";
        return ejecutarConsulta($sql, [$usuario_id, $rol_id]);
    }

    public function eliminar($usuario_id, $rol_id)
    {
        $sql = "DELETE FROM usuario_rol WHERE usuario_id = ? AND rol_id = ?";
        return ejecutarConsulta($sql, [$usuario_id, $rol_id]);
    }

    /** Listar los roles asignados a un usuario **/
    public function listarPorUsuario($usuario_id)
    {
        $sql = "SELECT ur.rol_id, r.nombre AS rol_nombre
                  FROM usuario_rol ur
                  JOIN rol r ON ur.rol_id = r.id
                 WHERE ur.usuario_id = ?";
        return ejecutarConsulta($sql, [$usuario_id]);
    }

    /** Opcional: listado completo de asignaciones **/
    public function listar()
    {
        $sql = "SELECT usuario_id, rol_id FROM usuario_rol";
        return ejecutarConsulta($sql);
    }

    /** Para el select de usuario-roles disponibles **/
    public function select()
    {
        $sql = "SELECT id, nombre FROM rol";
        return ejecutarConsulta($sql);
    }
}
