<?php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/CategoriaProveedor.php';

$cat = new CategoriaProveedor();

header('Content-Type: application/json; charset=utf-8');

$op     = $_GET['op'] ?? '';
$id     = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';

switch ($op) {
    case 'guardar':
        $ok = $cat->insertar($nombre);
        echo json_encode([
            'status' => $ok ? 'success' : 'error',
            'msg'    => $ok ? 'Categoría creada correctamente' : 'Error al crear categoría'
        ]);
        break;

    case 'editar':
        $ok = $cat->editar($id, $nombre);
        echo json_encode([
            'status' => $ok ? 'success' : 'error',
            'msg'    => $ok ? 'Categoría actualizada correctamente' : 'Error al actualizar categoría'
        ]);
        break;

    case 'desactivar':
        $rspta = $cat->desactivar($id);
        echo json_encode([
            'status' => $rspta ? 'success' : 'error',
            'msg'    => $rspta ? 'Categoría desactivada' : 'Error al desactivar categoría'
        ]);
        break;

    case 'activar':
        $rspta = $cat->activar($id);
        echo json_encode([
            'status' => $rspta ? 'success' : 'error',
            'msg'    => $rspta ? 'Categoría activada' : 'Error al activar categoría'
        ]);
        break;

    case 'mostrar':
        $rspta = $cat->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $cat->listar();
        $data  = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                $reg->id,
                htmlspecialchars($reg->nombre),
                $reg->created_at,
                $reg->updated_at,
                $reg->is_active
                  ? '<span class="badge badge-success">Activo</span>'
                  : '<span class="badge badge-danger">Inactivo</span>',
                $reg->is_active
                  ? '<button class="btn btn-sm btn-primary btn-edit" data-id="' . $reg->id . '"><i class="fa fa-edit"></i></button> '
                    .'<button class="btn btn-sm btn-danger btn-deactivate" data-id="' . $reg->id . '"><i class="fa fa-trash"></i></button>'
                  : '<button class="btn btn-sm btn-success btn-activate" data-id="' . $reg->id . '"><i class="fa fa-check"></i></button>'
            ];
        }
        echo json_encode(['data' => $data]);
        break;

    case 'select':
        $rspta = $cat->select();
        while ($reg = $rspta->fetch_object()) {
            echo "<option value=\"{$reg->id}\">{$reg->nombre}</option>";
        }
        break;
}
