<?php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/Cliente.php';
header('Content-Type: application/json; charset=utf-8');

$cli = new Cliente();

$id                   = isset($_POST['id'])                ? limpiarCadena($_POST['id'])                : '';
$ruc                  = isset($_POST['ruc'])               ? limpiarCadena($_POST['ruc'])               : '';
$razon_social         = isset($_POST['razon_social'])      ? limpiarCadena($_POST['razon_social'])      : '';
$categoria_id         = isset($_POST['categoria_id'])      ? limpiarCadena($_POST['categoria_id'])      : null;
$direccion_fiscal     = isset($_POST['direccion_fiscal'])  ? limpiarCadena($_POST['direccion_fiscal'])  : '';
$direccion_planta     = isset($_POST['direccion_planta'])  ? limpiarCadena($_POST['direccion_planta'])  : '';
$departamento         = isset($_POST['departamento'])      ? limpiarCadena($_POST['departamento'])      : '';
$provincia            = isset($_POST['provincia'])         ? limpiarCadena($_POST['provincia'])         : '';
$distrito             = isset($_POST['distrito'])         ? limpiarCadena($_POST['distrito'])         : '';
$telefono_fijo        = isset($_POST['telefono_fijo'])     ? limpiarCadena($_POST['telefono_fijo'])     : '';
$telefono_movil       = isset($_POST['telefono_movil'])    ? limpiarCadena($_POST['telefono_movil'])    : '';
$email                = isset($_POST['email'])             ? limpiarCadena($_POST['email'])             : '';
$web                  = isset($_POST['web'])               ? limpiarCadena($_POST['web'])               : '';
$contacto_responsable = isset($_POST['contacto_responsable']) ? limpiarCadena($_POST['contacto_responsable']) : '';
$cargo_contacto       = isset($_POST['cargo_contacto'])    ? limpiarCadena($_POST['cargo_contacto'])    : '';
$telefono_contacto    = isset($_POST['telefono_contacto']) ? limpiarCadena($_POST['telefono_contacto']) : '';
$email_contacto       = isset($_POST['email_contacto'])    ? limpiarCadena($_POST['email_contacto'])    : '';

switch ($_GET['op']) {
    case 'guardar':
        $rspta = $cli->insertar(
            $ruc, $razon_social, $categoria_id,
            $direccion_fiscal, $direccion_planta,
            $departamento, $provincia, $distrito,
            $telefono_fijo, $telefono_movil,
            $email, $web,
            $contacto_responsable, $cargo_contacto,
            $telefono_contacto, $email_contacto
        );
        echo json_encode(['status' => $rspta ? 'success' : 'error', 'msg' => $rspta ? 'Cliente registrado correctamente' : 'Error al registrar cliente']);
        break;

    case 'editar':
        $rspta = $cli->editar(
            $id,
            $ruc, $razon_social, $categoria_id,
            $direccion_fiscal, $direccion_planta,
            $departamento, $provincia, $distrito,
            $telefono_fijo, $telefono_movil,
            $email, $web,
            $contacto_responsable, $cargo_contacto,
            $telefono_contacto, $email_contacto
        );
        echo json_encode(['status' => $rspta ? 'success' : 'error', 'msg' => $rspta ? 'Cliente actualizado correctamente' : 'Error al actualizar cliente']);
        break;

    case 'mostrar':
        $rspta = $cli->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $cli->listar();
        $data  = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0" => $reg->id,
                "1" => htmlspecialchars($reg->ruc),
                "2" => htmlspecialchars($reg->razon_social),
                "3" => htmlspecialchars($reg->email),
                "4" => htmlspecialchars($reg->telefono_movil),
                "5" => $reg->estado
                          ? '<span class="badge badge-success">Activo</span>'
                          : '<span class="badge badge-danger">Inactivo</span>',
                "6" => /* aquí van los botones edit/activar/desactivar según $reg->estado */
                      '<button class="btn btn-warning btn-xs" onclick="mostrarCliente(' . $reg->id . ')"><i class="fa fa-edit"></i></button>'
                      . ' ' .
                      ($reg->estado
                          ? '<button class="btn btn-danger btn-xs" onclick="desactivarCliente(' . $reg->id . ')"><i class="fa fa-window-close"></i></button>'
                          : '<button class="btn btn-success btn-xs" onclick="activarCliente(' . $reg->id . ')"><i class="fa fa-check-square"></i></button>')
            ];
        }
        echo json_encode(["data" => $data]);
        break;

    case 'select':
        $rspta = $cli->select();
        while ($reg = $rspta->fetch_object()) {
            echo "<option value=\"{$reg->id}\">" . htmlspecialchars($reg->razon_social) . "</option>";
        }
        break;
}
