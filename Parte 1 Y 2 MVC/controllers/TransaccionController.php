<?php

require_once './models/Transaccion.php';
require_once './models/Cuenta.php';

class TransaccionController
{
    public function index()
    {
        $transacciones = (new Transaccion())->getAll();
        require './views/transacciones/listar.php';
    }

    public function crear()
    {
        $cuentas = (new Cuenta())->getAll(); // Para el select FK

        if ($_POST) {
            (new Transaccion())->save(
                $_POST['tipo'],
                $_POST['monto'],
                $_POST['id_cuenta'] // FK
            );

            header("Location: ./frontController.php?&accion=index&controller=Transaccion");
        }

        require './views/transacciones/crear.php';
    }
    public function eliminar()
    {
        (new Transaccion())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Transaccion");
    }
}