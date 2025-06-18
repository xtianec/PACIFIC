<?php
require_once __DIR__ . '/../config/Conexion.php';

class CategoriaProveedor
{
    public function insertar($nombre)
    {
        $nombre = limpiarCadena($nombre);
        $sql = "INSERT INTO proveedorcategoria (nombre) VALUES (?)";
        return ejecutarConsulta($sql, [$nombre]);
    }

    public function editar($id, $nombre)
    {
        $id     = limpiarCadena($id);
        $nombre = limpiarCadena($nombre);
        $sql = "UPDATE proveedorcategoria SET nombre = ? WHERE categoria_id = ?";
        return ejecutarConsulta($sql, [$nombre, $id]);
    }

    public function mostrar($id)
    {
        $id  = limpiarCadena($id);
        $sql = "SELECT * FROM proveedorcategoria WHERE categoria_id = ?";
        return ejecutarConsultaSimpleFila($sql, [$id]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM proveedorcategoria ORDER BY nombre";
        return ejecutarConsulta($sql);
    }

    public function select()
    {
        $sql = "SELECT categoria_id AS id, nombre FROM proveedorcategoria ORDER BY nombre";
        return ejecutarConsulta($sql);
    }
}
