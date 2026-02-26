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
        return $this->db->query("SELECT * FROM clientes")->fetchAll();
    }
    public function getByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $cliente_buscar = $stmt->fetch(PDO::FETCH_ASSOC);
        if (filter_var($cliente_buscar, FILTER_VALIDATE_BOOLEAN) === false && $cliente_buscar === false) {
            return false;
        } else if (count($cliente_buscar) > 0) {
            return $cliente_buscar;
        }
    }
    public function save($nombre, $apellidos, $dni, $telefono, $direccion, $email, $contrasenia)
    {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, apellidos, DNI, telefono, direccion, email, password) VALUES(?,?,?,?, ?)");
        $stmt->execute([$nombre, $apellidos, $dni, $telefono, $direccion, $email, $contrasenia]);
    }
    public function update($id, $nombre, $apellidos, $email, $telefono, $direccion)
    {
        $stmt = $this->db->prepare("UPDATE clientes SET nombre = ?,apellidos = ?,email = ?, telefono = ?, direccion = ? WHERE id = ?");
        $stmt->execute([$nombre, $apellidos, $email, $telefono, $direccion, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id= ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
