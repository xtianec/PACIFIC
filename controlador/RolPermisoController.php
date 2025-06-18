<?php
// File: controlador/RolPermisoController.php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/RolPermiso.php';

$mc = new RolPermiso();
$rol_id     = isset($_POST['rol_id'])    ? limpiarCadena($_POST['rol_id'])    : '';
$permiso_id = isset($_POST['permiso_id'])? limpiarCadena($_POST['permiso_id']): '';

switch ($_GET['op']) {
    case 'asignar':
        echo $mc->insertar($rol_id, $permiso_id) ? "Asignado" : "Error al asignar";
        break;
    case 'desasignar':
        echo $mc->eliminar($rol_id, $permiso_id) ? "Desasignado" : "Error al desasignar";
        break;
    case 'listar':
        $rspta = $mc->listarPorRol($rol_id);
        $data = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0"=>$reg->permiso_id,
                "1"=>htmlspecialchars($reg->modulo).' / '.htmlspecialchars($reg->accion),
                "2"=>'<button onclick="desasignarPerm('.$rol_id.','.$reg->permiso_id.')">✖</button>'
            ];
        }
        echo json_encode(["aaData"=>$data]);
        break;
    case 'select':
        $rspta = $mc->select();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="'.$reg->id.'">'.htmlspecialchars($reg->modulo).' / '.htmlspecialchars($reg->accion).'</option>';
        }
        break;
}
