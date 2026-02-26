<?php

require_once './config/conexion.php';

class Empleado
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM empleado")->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM empleado WHERE id_empleado = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($nombre, $cargo, $sucursal, $telefono)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO empleado (nombre, cargo, sucursal, telefono) VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$nombre, $cargo, $sucursal, $telefono]);
    }

    public function update($id, $nombre, $cargo, $sucursal, $telefono)
    {
        $stmt = $this->db->prepare(
            "UPDATE empleado 
             SET nombre = ?, cargo = ?, sucursal = ?, telefono = ?
             WHERE id_empleado = ?"
        );
        $stmt->execute([$nombre, $cargo, $sucursal, $telefono, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM empleado WHERE id_empleado = ?");
        $stmt->execute([$id]);
    }
}