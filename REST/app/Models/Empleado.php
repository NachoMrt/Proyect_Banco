<?php

require_once __DIR__ . '/../Core/database.php';

class Empleado {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM empleado");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM empleado WHERE id_empleado = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO empleado (nombre, cargo, sucursal, telefono) VALUES (?, ?, ? , ?)");
        $stmt->execute([$data['nombre'], $data['cargo'], $data['sucursal'] , $data['telefono']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE empleado SET nombre = ?, cargo = ?, sucursal = ?, telefono = ? WHERE id_empleado = ?");
        $stmt->execute([$data['nombre'], $data['cargo'], $data['sucursal'] , $data['telefono'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM empleado WHERE id_empleado = ?");
        return $stmt->execute([$id]);
    }
}



