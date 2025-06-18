<?php
require_once __DIR__ . '/../config/Conexion.php';

class EquipoTipo
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO equipo_tipos (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE equipo_tipos SET nombre = ? WHERE tipo_id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM equipo_tipos WHERE tipo_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM equipo_tipos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT tipo_id AS id, nombre FROM equipo_tipos ORDER BY nombre";
        return ejecutarConsulta($sql);
    }
}
