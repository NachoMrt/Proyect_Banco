<?php
// Cabeceras para que el navegador/cliente sepa que es una API
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Capturamos la ruta: api.php?resource=cliente&id=1
$resource = $_GET['resource'] ?? null;
$id = $_GET['id'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];

// Mapeo de recursos a tus archivos de modelo existentes
$models = [
    'cliente'     => 'Cliente',
    'cuenta'      => 'Cuenta',
    'empleado'    => 'Empleado',
    'transaccion' => 'Transaccion'
];

if (!isset($models[$resource])) {
    http_response_code(404);
    echo json_encode(["error" => "Recurso no encontrado"]);
    exit;
}

// Cargamos el modelo que ya tienes
require_once "./models/" . $models[$resource] . ".php";
$className = $models[$resource];
$objeto = new $className();

// Lógica REST genérica usando tus métodos existentes
switch ($method) {
    case 'GET':
        if ($id) {
            $data = $objeto->getById($id); // Usa tus métodos getById
            echo json_encode($data ? $data : ["error" => "No encontrado"]);
        } else {
            echo json_encode($objeto->getAll()); // Usa tus métodos getAll
        }
        break;

    case 'POST':
        // Leemos el JSON que envíe el cliente
        $input = json_decode(file_get_contents("php://input"), true);
        if ($resource == 'cliente') {
            $objeto->save($input['nombre'], $input['apellido'], $input['DNI'], $input['telefono'], $input['direccion']);
        } elseif ($resource == 'cuenta') {
            $objeto->save($input['tipo_cuenta'], $input['saldo'], $input['id_cliente']);
        }
        echo json_encode(["status" => "creado"]);
        break;

    case 'DELETE':
        if ($id) {
            $objeto->delete($id); // Usa tus métodos delete
            echo json_encode(["status" => "eliminado"]);
        }
        break;
}