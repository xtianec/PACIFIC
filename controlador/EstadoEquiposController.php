<?php
// File: controlador/EstadoEquiposController.php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/EstadoEquipos.php';

$mc = new EstadoEquipos();
$id     = isset($_POST['id'])          ? limpiarCadena($_POST['id'])          : '';
$descripcion = isset($_POST['descripcion']) ? limpiarCadena($_POST['descripcion']) : '';

switch ($_GET['op']) {
    case 'guardar':
        echo $mc->insertar($descripcion) ? "Registrado" : "Error al registrar";
        break;
    case 'editar':
        echo $mc->editar($id, $descripcion) ? "Actualizado" : "Error al actualizar";
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
        header('Content-Type: application/json; charset=utf-8');
        // evita cualquier salida previa (spaces, BOM, notices...)
        error_reporting(E_ERROR | E_PARSE);
        $rspta = $mc->listar();
        $data = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0" => $reg->estado_id,
                "1" => htmlspecialchars($reg->descripcion),
                "2" => $reg->is_active
                    ? '<span class="badge badge-success">Activo</span>'
                    : '<span class="badge badge-danger">Inactivo</span>',
                "3" => $reg->is_active
                    ? '<button class="btn-edit">✎</button> <button class="btn-desactivar">✖</button>'
                    : '<button class="btn-activar">✔</button>',
            ];
        }
        // DataTables v1.10 espera { data: […] }
        echo json_encode(['data' => $data]);
        exit;

    case 'select':
        $rspta = $mc->select();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="' . $reg->id . '">' . htmlspecialchars($reg->descripcion) . '</option>';
        }
        break;
}
