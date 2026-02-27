<?php
// El controlador es el que contiene la lógica real de los endpoints (CRUD, validaciones…).

require_once __DIR__ . '/../Models/Transaccion.php';

class TransaccionController {

    public function index() {
        echo json_encode(Transaccion::all());
    }

    public function show($id) {
        $Transaccion = Transaccion::find($id);
        if(!$Transaccion) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Transaccion no encontrado']);
        } else {
            echo json_encode($Transaccion);
        }
    }

    public function store($data) {
        if(!isset($data['fecha']) || !isset($data['tipo']) || !isset($data['monto']) || !isset($data['id_cuenta'])) {
            http_response_code(400);
            echo json_encode(['mensaje'=>'Datos incompletos']);
            return;
        }
        $Transaccion = Transaccion::create($data);
        http_response_code(201);
        echo json_encode($Transaccion);
    }

    public function update($id, $data) {
        $Transaccion = Transaccion::update($id, $data);
        if(!$Transaccion) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Transaccion no encontrado']);
        } else {
            echo json_encode($Transaccion);
        }
    }

    public function delete($id) {
        $result = Transaccion::delete($id);
        if($result) {
            echo json_encode(['mensaje'=>'Transaccion eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Transaccion no encontrado']);
        }
    }

}



