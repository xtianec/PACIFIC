<?php
// File: controlador/UsuarioRolController.php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/UsuarioRol.php';

$mc = new UsuarioRol();
$usuario_id = isset($_POST['usuario_id']) ? limpiarCadena($_POST['usuario_id']) : '';
$rol_id     = isset($_POST['rol_id'])     ? limpiarCadena($_POST['rol_id'])     : '';

switch ($_GET['op']) {
    case 'asignar':
        echo $mc->insertar($usuario_id, $rol_id) ? "Asignado" : "Error al asignar";
        break;
    case 'desasignar':
        echo $mc->eliminar($usuario_id, $rol_id) ? "Desasignado" : "Error al desasignar";
        break;
    case 'listar':
        $rspta = $mc->listarPorUsuario($usuario_id);
        $data = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0"=>$reg->rol_id,
                "1"=>htmlspecialchars($reg->rol_nombre),
                "2"=>'<button onclick="desasignarUR('.$usuario_id.','.$reg->rol_id.')">✖</button>'
            ];
        }
        echo json_encode(["data"=>$data]);
        break;
    case 'select':
        $rspta = $mc->select();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="'.$reg->id.'">'.htmlspecialchars($reg->nombre).'</option>';
        }
        break;
}
