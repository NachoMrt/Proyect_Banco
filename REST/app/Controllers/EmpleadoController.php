<?php
// El controlador es el que contiene la lógica real de los endpoints (CRUD, validaciones…).

require_once __DIR__ . '/../Models/Empleado.php';

class EmpleadoController {

    public function index() {
        echo json_encode(Empleado::all());
    }

    public function show($id) {
        $empleado = Empleado::find($id);
        if(!$empleado) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Empleado no encontrado']);
        } else {
            echo json_encode($empleado);
        }
    }

    public function store($data) {
        if(!isset($data['nombre']) || !isset($data['cargo']) || !isset($data['sucursal']) || !isset($data['telefono'])) {
            http_response_code(400);
            echo json_encode(['mensaje'=>'Datos incompletos']);
            return;
        }
        $empleado = Empleado::create($data);
        http_response_code(201);
        echo json_encode($empleado);
    }

    public function update($id, $data) {
        $empleado = Empleado::update($id, $data);
        if(!$empleado) {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Empleado no encontrado']);
        } else {
            echo json_encode($empleado);
        }
    }

    public function delete($id) {
        $result = Empleado::delete($id);
        if($result) {
            echo json_encode(['mensaje'=>'Empleado eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje'=>'Empleado no encontrado']);
        }
    }

}



