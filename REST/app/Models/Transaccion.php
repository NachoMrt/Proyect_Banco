<?php

require_once __DIR__ . '/../Core/database.php';

class Transaccion {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM transaccion");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM transaccion WHERE id_transaccion = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO transaccion (fecha, tipo, monto, id_cuenta) VALUES (?, ?, ? , ?)");
        $stmt->execute([$data['fecha'], $data['tipo'], $data['monto'] , $data['id_cuenta']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE transaccion SET fecha = ?, tipo = ?,monto = ?, id_cuenta = ? WHERE id_transaccion = ?");
        $stmt->execute([$data['fecha'], $data['tipo'], $data['monto'] , $data['id_cuenta'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM transaccion WHERE id_transaccion = ?");
        return $stmt->execute([$id]);
    }
}



