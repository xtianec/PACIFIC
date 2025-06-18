<?php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/CategoriaProveedor.php';

$cat = new CategoriaProveedor();

$id     = isset($_POST['id'])     ? limpiarCadena($_POST['id'])     : '';
$nombre = isset($_POST['nombre']) ? limpiarCadena($_POST['nombre']) : '';

switch ($_GET['op']) {
    case 'guardar':
        $rspta = $cat->insertar($nombre);
        echo $rspta ? "Categoría proveedor registrada correctamente" : "Error al registrar categoría proveedor";
        break;

    case 'editar':
        $rspta = $cat->editar($id, $nombre);
        echo $rspta ? "Categoría proveedor actualizada correctamente" : "Error al actualizar categoría proveedor";
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
                "0" => $reg->categoria_id,
                "1" => htmlspecialchars($reg->nombre)
            ];
        }
        echo json_encode(["aaData" => $data]);
        break;

    case 'select':
        $rspta = $cat->select();
        while ($reg = $rspta->fetch_object()) {
            echo "<option value=\"{$reg->id}\">{$reg->nombre}</option>";
        }
        break;
}
