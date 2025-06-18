<?php
// File: controlador/UsuarioController.php
require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/../modelos/Usuario.php';

$mc = new Usuario();
$id       = isset($_POST['id'])       ? limpiarCadena($_POST['id'])       : '';
$username = isset($_POST['username']) ? limpiarCadena($_POST['username']): '';
$password = isset($_POST['password']) ? limpiarCadena($_POST['password']): '';
$estado   = isset($_POST['estado'])   ? limpiarCadena($_POST['estado'])  : '1';

switch ($_GET['op']) {
    case 'guardar':
        $hash = password_hash($password, PASSWORD_BCRYPT);
        echo $mc->insertar($username, $hash, $estado) ? "Registrado" : "Error al registrar";
        break;
    case 'editar':
        if ($password!=='') {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $rspta = $mc->editarConPass($id, $username, $hash, $estado);
        } else {
            $rspta = $mc->editar($id, $username, $estado);
        }
        echo $rspta ? "Actualizado" : "Error al actualizar";
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
                "1"=>htmlspecialchars($reg->username),
                "2"=>($reg->estado)
                    ?'<span class="badge badge-success">Activo</span>'
                    :'<span class="badge badge-danger">Inactivo</span>',
                "3"=>($reg->estado)
                    ?'<button onclick="editarUsuario('.$reg->id.')">✎</button> '
                     .'<button onclick="desactivarUsuario('.$reg->id.')">✖</button>'
                    :'<button onclick="activarUsuario('.$reg->id.')">✔</button>'
            ];
        }
        echo json_encode(["aaData"=>$data]);
        break;
    case 'select':
        $rspta = $mc->select();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="'.$reg->id.'">'.htmlspecialchars($reg->username).'</option>';
        }
        break;
}
