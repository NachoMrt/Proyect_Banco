<?php

require_once __DIR__ . '/../Controllers/ClienteController.php';
require_once __DIR__ . '/../Controllers/EmpleadoController.php';
require_once __DIR__ . '/../Controllers/TransaccionController.php';
require_once __DIR__ . '/../Controllers/CuentaController.php';


class Router
{
    private $controllerCl;
    private $controllerE;
    private $controllerT;
    private $controllerCu;


    public function __construct()
    {
        $this->controllerCl = new ClienteController();
        $this->controllerE = new EmpleadoController();
        $this->controllerT = new TransaccionController();
        $this->controllerCu = new CuentaController();
    }
    public function route($method, $uri, $data = null)
    {
        $parts = explode('/', trim($uri, '/'));
        if ($parts[0] != 'clientes' && $parts[0] != 'empleados' && $parts[0] != 'transacciones' && $parts[0] != 'cuentas') {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Ruta no encontrada']);
            return;
        }

        $id = $parts[1] ?? null;

        if ($parts[0] === 'clientes') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerCl->show($id) : $this->controllerCl->index();
                    break;
                case 'POST':
                    $this->controllerCl->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerCl->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerCl->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }
        if ($parts[0] === 'empleados') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerE->show($id) : $this->controllerE->index();
                    break;
                case 'POST':
                    $this->controllerE->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerE->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerE->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }

        if ($parts[0] === 'transacciones') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerT->show($id) : $this->controllerT->index();
                    break;
                case 'POST':
                    $this->controllerT->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerT->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerT->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }
        if ($parts[0] === 'cuentas') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerCu->show($id) : $this->controllerCu->index();
                    break;
                case 'POST':
                    $this->controllerCu->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerCu->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerCu->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }
    }
}





