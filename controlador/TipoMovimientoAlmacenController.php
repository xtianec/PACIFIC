<?php
// File: controlador/TipoMovimientoAlmacenController.php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/TipoMovimientoAlmacen.php';

$mc = new TipoMovimientoAlmacen();
$id     = isset($_POST['id'])        ? limpiarCadena($_POST['id'])        : '';
$nombre = isset($_POST['nombre'])    ? limpiarCadena($_POST['nombre'])    : '';

switch ($_GET['op']) {
    case 'guardar':
        echo $mc->insertar($nombre) ? "Registrado" : "Error al registrar";
        break;
    case 'editar':
        echo $mc->editar($id, $nombre) ? "Actualizado" : "Error al actualizar";
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
                "1"=>htmlspecialchars($reg->nombre),
                "2"=>($reg->is_active??1)
                    ?'<span class="badge badge-success">Activo</span>'
                    :'<span class="badge badge-danger">Inactivo</span>',
                "3"=>($reg->is_active??1)
                    ?'<button onclick="editarTMA('.$reg->id.')">✎</button> '
                     .'<button onclick="desactivarTMA('.$reg->id.')">✖</button>'
                    :'<button onclick="activarTMA('.$reg->id.')">✔</button>'
            ];
        }
        echo json_encode(["aaData"=>$data]);
        break;
    case 'select':
        $rspta = $mc->select();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="'.$reg->id.'">'.htmlspecialchars($reg->nombre).'</option>';
        }
        break;
}
