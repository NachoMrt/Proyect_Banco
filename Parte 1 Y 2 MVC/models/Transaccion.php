<?php

require_once './config/conexion.php';

class Transaccion
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM transacciones")->fetchAll();
    }
    public function getByAccount($id_cuenta)
    {
        $stmt = $this->db->prepare("SELECT * FROM transacciones WHERE id_cuenta = ?");
        $stmt->execute([$id_cuenta]);
        $transaccion_buscar = $stmt->fetch(PDO::FETCH_ASSOC);
        if (filter_var($transaccion_buscar, FILTER_VALIDATE_BOOLEAN) === false && $transaccion_buscar === false) {
            return false;
        } else if (count($transaccion_buscar) > 0) {
            return $transaccion_buscar;
        }
    }
    public function save($tipo, $monto, $id_cuenta)
    {
        $stmt = $this->db->prepare("INSERT INTO transacciones (tipo, monto, id_cuenta) VALUES(?,?,?)");
        $stmt->execute([$tipo, $monto, $id_cuenta]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM transacciones WHERE id_transaccion = ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM transacciones WHERE id_transaccion = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function restarDinero($id_transaccione, $cantidad)
    {
        $stmt = $this->db->prepare('UPDATE transacciones SET saldo = saldo - ? WHERE id = ?');
        $stmt->execute([$cantidad, $id_transaccione]);
    }

    public function ingresarDinero($id_transaccione, $cantidad)
    {
        $stmt = $this->db->prepare('UPDATE transacciones SET saldo = saldo + ? WHERE id = ?');
        $stmt->execute([$cantidad, $id_transaccione]);
    }
}
