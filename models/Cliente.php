<?php

require_once './config/conexion.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM cliente")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($nombre, $apellido, $dni, $telefono, $direccion)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO cliente (nombre, apellido, DNI, telefono, direccion) 
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$nombre, $apellido, $dni, $telefono, $direccion]);
    }

    public function update($id, $nombre, $apellido, $dni, $telefono, $direccion)
    {
        $stmt = $this->db->prepare(
            "UPDATE cliente 
             SET nombre = ?, apellido = ?, DNI = ?, telefono = ?, direccion = ?
             WHERE id_cliente = ?"
        );
        $stmt->execute([$nombre, $apellido, $dni, $telefono, $direccion, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM cliente WHERE id_cliente = ?");
        $stmt->execute([$id]);
    }
}