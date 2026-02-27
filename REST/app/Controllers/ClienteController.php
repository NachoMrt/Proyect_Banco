<?php
// El controlador es el que contiene la lógica real de los endpoints (CRUD, validaciones…).

require_once __DIR__ . '/../Models/Cliente.php';

class ClienteController {

    public function index() {
        echo json_encode(Cliente::all());
    }

    public function show($id) {
        $cliente = Cliente::find($id);
        if(!$cliente) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Cliente no encontrado']);
        } else {
            echo json_encode($cliente);
        }
    }

    public function store($data) {
        if(!isset($data['nombre']) || !isset($data['email'])) {
            http_response_code(400);
            echo json_encode(['mensaje'=>'Datos incompletos']);
            return;
        }
        $cliente = Cliente::create($data);
        http_response_code(201);
        echo json_encode($cliente);
    }

    public function update($id, $data) {
        $cliente = Cliente::update($id, $data);
        if(!$cliente) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Cliente no encontrado']);
        } else {
            echo json_encode($cliente);
        }
    }

    public function delete($id) {
        $result = Cliente::delete($id);
        if($result) {
            echo json_encode(['mensaje'=>'Cliente eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Cliente no encontrado']);
        }
    }

}



