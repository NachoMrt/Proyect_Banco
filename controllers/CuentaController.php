<?php

require_once './models/Cuenta.php';
require_once './models/Cliente.php';

class CuentaController
{
    public function index()
    {
        $cuentas = (new Cuenta())->getAll();
        require './views/cuentas/listar.php';
    }

    public function crear()
    {
        $clientes = (new Cliente())->getAll(); // Para el select

        if ($_POST) {
            (new Cuenta())->save(
                $_POST['tipo_cuenta'],
                $_POST['id_cliente'] // FK
            );

            header("Location: ./frontController.php?&accion=index&controller=Cuenta");
        }

        require './views/cuentas/crear.php';
    }

    public function eliminar()
    {
        (new Cuenta())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Cuenta");
    }
}