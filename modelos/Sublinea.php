<?php
require_once __DIR__ . '/../config/Conexion.php';

class Sublinea
{
    public function insertar($linea_id, $nombre)
    {
        $linea_id = limpiarCadena($linea_id);
        $nombre   = limpiarCadena($nombre);
        $sql = "INSERT INTO sublinea (linea_id, nombre) VALUES (?, ?)";
        return ejecutarConsulta($sql, [$linea_id, $nombre]);
    }

    public function editar($id, $linea_id, $nombre)
    {
        $id       = limpiarCadena($id);
        $linea_id = limpiarCadena($linea_id);
        $nombre   = limpiarCadena($nombre);
        $sql = "UPDATE sublinea SET linea_id = ?, nombre = ? WHERE id = ?";
        return ejecutarConsulta($sql, [$linea_id, $nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM sublinea WHERE id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = <<<SQL
SELECT s.id, s.nombre, l.nombre AS linea
FROM sublinea s
JOIN linea l ON s.linea_id = l.id
ORDER BY l.nombre, s.nombre
SQL;
        return ejecutarConsulta($sql);
    }

    public function select($linea_id = null)
    {
        if ($linea_id) {
            $linea_id = limpiarCadena($linea_id);
            $sql = "SELECT id, nombre FROM sublinea WHERE linea_id = ? ORDER BY nombre";
            return ejecutarConsulta($sql, [$linea_id]);
        }
        $sql = "SELECT id, nombre FROM sublinea ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id)
    {
        $sql = "UPDATE sublinea SET is_active = 0 WHERE linea_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }

    public function activar($id)
    {
        $sql = "UPDATE sublinea SET is_active = 1 WHERE linea_id = ?";
        return ejecutarConsulta($sql, [$id]);
    }
}
