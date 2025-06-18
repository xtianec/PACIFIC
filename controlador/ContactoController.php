<?php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/Contacto.php';

$cont = new Contacto();

$id        = isset($_POST['id'])      ? limpiarCadena($_POST['id'])      : '';
$nombre    = isset($_POST['nombre'])  ? limpiarCadena($_POST['nombre'])  : '';
$cargo     = isset($_POST['cargo'])   ? limpiarCadena($_POST['cargo'])   : '';
$telefono  = isset($_POST['telefono'])? limpiarCadena($_POST['telefono']): '';
$email     = isset($_POST['email'])   ? limpiarCadena($_POST['email'])   : '';

switch ($_GET['op']) {
    case 'guardar':
        $rspta = $cont->insertar($nombre, $cargo, $telefono, $email);
        echo $rspta ? "Contacto registrado correctamente" : "Error al registrar contacto";
        break;

    case 'editar':
        $rspta = $cont->editar($id, $nombre, $cargo, $telefono, $email);
        echo $rspta ? "Contacto actualizado correctamente" : "Error al actualizar contacto";
        break;

    case 'mostrar':
        $rspta = $cont->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $cont->listar();
        $data  = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                $reg->contacto_id,
                htmlspecialchars($reg->nombre),
                htmlspecialchars($reg->cargo),
                htmlspecialchars($reg->telefono),
                htmlspecialchars($reg->email)
            ];
        }
        echo json_encode(["aaData" => $data]);
        break;

    case 'select':
        $rspta = $cont->select();
        while ($reg = $rspta->fetch_object()) {
            echo "<option value=\"{$reg->id}\">" . htmlspecialchars($reg->nombre) . "</option>";
        }
        break;
}
