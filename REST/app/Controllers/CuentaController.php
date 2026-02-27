<?php
// El controlador es el que contiene la lógica real de los endpoints (CRUD, validaciones…).

require_once __DIR__ . '/../Models/Cuenta.php';

class CuentaController {

    public function index() {
        echo json_encode(Cuenta::all());
    }

    public function show($id) {
        $cuenta = Cuenta::find($id);
        if(!$cuenta) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Cuenta no encontrado']);
        } else {
            echo json_encode($cuenta);
        }
    }

    public function store($data) {
        if(!isset($data['id_cuenta']) || !isset($data['tipo_cuenta']) || !isset($data['saldo']) || !isset($data['fecha_apertura']) || !isset($data['id_cliente'])) {
            http_response_code(400);
            echo json_encode(['mensaje'=>'Datos incompletos']);
            return;
        }
        $cuenta = Cuenta::create($data);
        http_response_code(201);
        echo json_encode($cuenta);
    }

    public function update($id, $data) {
        $cuenta = Cuenta::update($id, $data);
        if(!$cuenta) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Cuenta no encontrado']);
        } else {
            echo json_encode($cuenta);
        }
    }

    public function delete($id) {
        $result = Cuenta::delete($id);
        if($result) {
            echo json_encode(['mensaje'=>'Cuenta eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Cuenta no encontrado']);
        }
    }

}



