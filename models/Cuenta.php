<?php

require_once './config/conexion.php';

class Cuenta
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM cuentas")->fetchAll();
    }
    public function getByClient($id_cliente)
    {
        $stmt = $this->db->prepare("SELECT * FROM cuentas WHERE id_cliente = ?");
        $stmt->execute([$id_cliente]);
        $cuenta_buscar = $stmt->fetch(PDO::FETCH_ASSOC);
        if (filter_var($cuenta_buscar, FILTER_VALIDATE_BOOLEAN) === false && $cuenta_buscar === false) {
            return false;
        } else if (count($cuenta_buscar) > 0) {
            return $cuenta_buscar;
        }
    }
    public function save($tipo_cuenta, $id_cliente)
    {
        $stmt = $this->db->prepare("INSERT INTO cuentas (tipo_cuenta, id_cliente) VALUES(?,?)");
        $stmt->execute([$tipo_cuenta, $id_cliente]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM cuentas WHERE id_cuenta= ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM cuentas WHERE id_cuenta = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function restarDinero($id_cuenta, $cantidad)
    {
        $stmt = $this->db->prepare('UPDATE cuentas SET saldo = saldo - ? WHERE id = ?');
        $stmt->execute([$cantidad, $id_cuenta]);
    }

    public function ingresarDinero($id_cuenta, $cantidad)
    {
        $stmt = $this->db->prepare('UPDATE cuentas SET saldo = saldo + ? WHERE id = ?');
        $stmt->execute([$cantidad, $id_cuenta]);
    }
}
