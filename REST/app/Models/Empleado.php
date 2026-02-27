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
        $stmt = $db->prepare("SELECT * FROM empleado WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO empleado (nombre, apellido, DNI, telefono, direccion) VALUES (?, ?, ? , ? , ?)");
        $stmt->execute([$data['nombre'], $data['apellido'], $data['DNI'] , $data['telefono'], $data['direccion']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE empleado SET nombre = ?, apellido = ? WHERE id = ?");
        $stmt->execute([$data['nombre'], $data['apellido'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM empleado WHERE id = ?");
        return $stmt->execute([$id]);
    }

}



