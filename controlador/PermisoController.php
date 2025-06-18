<?php
// File: controlador/PermisoController.php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/Permiso.php';

$mc = new Permiso();
$id        = isset($_POST['id'])        ? limpiarCadena($_POST['id'])        : '';
$modulo_id = isset($_POST['modulo_id']) ? limpiarCadena($_POST['modulo_id']): '';
$accion    = isset($_POST['accion'])    ? limpiarCadena($_POST['accion'])   : '';

switch ($_GET['op']) {
    case 'guardar':
        echo $mc->insertar($modulo_id, $accion) ? "Registrado" : "Error al registrar";
        break;
    case 'editar':
        echo $mc->editar($id, $modulo_id, $accion) ? "Actualizado" : "Error al actualizar";
        break;
    case 'desactivar':
        echo $mc->desactivar($id) ? "Desactivado" : "Error al desactivar";
        break;
    case 'activar':
        echo $mc->activar($id) ? "Activado" : "Error al activar";
        break;
    case 'mostrar':
        echo json_encode($mc->mostrar($id));
        break;
    case 'listar':
        $rspta = $mc->listar();
        $data = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0"=>$reg->id,
                "1"=>htmlspecialchars($reg->modulo),
                "2"=>htmlspecialchars($reg->accion),
                "3"=>($reg->is_active??1)
                    ?'<span class="badge badge-success">Activo</span>'
                    :'<span class="badge badge-danger">Inactivo</span>',
                "4"=>($reg->is_active??1)
                    ?'<button onclick="editarPermiso('.$reg->id.')">✎</button> '
                     .'<button onclick="desactivarPermiso('.$reg->id.')">✖</button>'
                    :'<button onclick="activarPermiso('.$reg->id.')">✔</button>'
            ];
        }
        echo json_encode(["data"=>$data]);
        break;
    case 'select':
        $rspta = $mc->select();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="'.$reg->id.'">'.htmlspecialchars($reg->modulo).' / '.htmlspecialchars($reg->accion).'</option>';
        }
        break;
}

