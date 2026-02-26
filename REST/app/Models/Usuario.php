<?php

require_once __DIR__ . '/../Core/database.php';

class Usuario {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM usuario1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM usuario1 WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO usuario1 (nombre, email, edad) VALUES (?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['email'], $data['edad']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE usuario1 SET nombre = ?, email = ? WHERE id = ?");
        $stmt->execute([$data['nombre'], $data['email'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM usuario1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

}



