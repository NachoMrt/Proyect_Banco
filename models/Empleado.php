<?php

require_once './config/conexion.php';

class Empelado
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function getByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM empelados WHERE email = ?");
        $stmt->execute([$email]);
        $empelado_buscar = $stmt->fetch(PDO::FETCH_ASSOC);
        if (filter_var($empelado_buscar, FILTER_VALIDATE_BOOLEAN) === false && $empelado_buscar === false) {
            return false;
        } else if (count($empelado_buscar) > 0) {
            return $empelado_buscar;
        }
    }
    public function save($nombre, $apellidos, $dni, $telefono, $email, $contrasenia)
    {
        $stmt = $this->db->prepare("INSERT INTO empelados (nombre, apellidos, DNI, telefono, email, password) VALUES(?,?,?,?, ?)");
        $stmt->execute([$nombre, $apellidos, $dni, $telefono, $email, $contrasenia]);
    }
    public function update($id, $nombre, $apellidos, $email, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE empelados SET nombre = ?,apellidos = ?,email = ?, telefono = ? WHERE id = ?");
        $stmt->execute([$nombre, $apellidos, $email, $telefono, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM empelados WHERE id= ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM empelados WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

}
