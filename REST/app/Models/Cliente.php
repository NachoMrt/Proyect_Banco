<?php

require_once __DIR__ . '/../Core/database.php';

class Cliente {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO cliente (nombre, apellido, DNI, telefono, direccion) VALUES (?, ?, ? , ? , ?)");
        $stmt->execute([$data['nombre'], $data['apellido'], $data['DNI'] , $data['telefono'], $data['direccion']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE cliente SET nombre = ?, apellido = ?, DNI = ?, telefono = ?, direccion = ? WHERE id_cliente = ?");
        $stmt->execute([$data['nombre'], $data['apellido'],$data['DNI'], $data['telefono'],$data['direccion'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM cliente WHERE id_cliente = ?");
        return $stmt->execute([$id]);
    }

}



