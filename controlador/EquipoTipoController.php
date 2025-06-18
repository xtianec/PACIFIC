<?php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/EquipoTipo.php';

$tip = new EquipoTipo();

$id     = isset($_POST['id'])     ? limpiarCadena($_POST['id'])     : '';
$nombre = isset($_POST['nombre']) ? limpiarCadena($_POST['nombre']) : '';

switch ($_GET['op']) {
    case 'guardar':
        $rspta = $tip->insertar($nombre);
        echo $rspta ? "Tipo de equipo registrado correctamente" : "Error al registrar tipo de equipo";
        break;

    case 'editar':
        $rspta = $tip->editar($id, $nombre);
        echo $rspta ? "Tipo de equipo actualizado correctamente" : "Error al actualizar tipo de equipo";
        break;

    case 'mostrar':
        $rspta = $tip->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $tip->listar();
        $data  = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0" => $reg->tipo_id,
                "1" => htmlspecialchars($reg->nombre)
            ];
        }
        echo json_encode(["data" => $data]);
        break;

    case 'select':
        $rspta = $tip->select();
        while ($reg = $rspta->fetch_object()) {
            echo "<option value=\"{$reg->id}\">{$reg->nombre}</option>";
        }
        break;
}
