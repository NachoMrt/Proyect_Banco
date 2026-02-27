<?php

require_once __DIR__ . '/../Core/database.php';

class Cuenta {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM cuenta");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM cuenta WHERE id_cuenta = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO cuenta (tipo_cuenta, saldo, fecha_apertura, id_cliente) VALUES (?, ?, ? , ?)");
        $stmt->execute([$data['tipo_cuenta'], $data['saldo'], $data['fecha_apertura'] , $data['id_cliente']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE cuenta SET tipo_cuenta = ?, saldo = ?,fecha_apertura = ?, id_cliente = ? WHERE id_cuenta = ?");
        $stmt->execute([$data['tipo_cuenta'], $data['saldo'], $data['fecha_apertura'] , $data['id_cliente'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM cuenta WHERE id_cuenta = ?");
        return $stmt->execute([$id]);
    }
}



