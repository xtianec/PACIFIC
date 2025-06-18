<?php
require_once __DIR__ . '/../config/Conexion.php';

class EquipoModelo
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO equipo_modelos (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE equipo_modelos SET nombre = ? WHERE modelo_id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM equipo_modelos WHERE modelo_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM equipo_modelos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT modelo_id AS id, nombre FROM equipo_modelos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }
}
