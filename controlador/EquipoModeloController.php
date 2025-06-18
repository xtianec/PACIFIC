<?php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/EquipoModelo.php';

$mod = new EquipoModelo();

$id     = isset($_POST['id'])     ? limpiarCadena($_POST['id'])     : '';
$nombre = isset($_POST['nombre']) ? limpiarCadena($_POST['nombre']) : '';

switch ($_GET['op']) {
    case 'guardar':
        $rspta = $mod->insertar($nombre);
        echo $rspta ? "Modelo de equipo registrado correctamente" : "Error al registrar modelo de equipo";
        break;

    case 'editar':
        $rspta = $mod->editar($id, $nombre);
        echo $rspta ? "Modelo de equipo actualizado correctamente" : "Error al actualizar modelo de equipo";
        break;

    case 'mostrar':
        $rspta = $mod->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $mod->listar();
        $data  = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0" => $reg->modelo_id,
                "1" => htmlspecialchars($reg->nombre)
            ];
        }
        echo json_encode(["aaData" => $data]);
        break;

    case 'select':
        $rspta = $mod->select();
        while ($reg = $rspta->fetch_object()) {
            echo "<option value=\"{$reg->id}\">{$reg->nombre}</option>";
        }
        break;
}
