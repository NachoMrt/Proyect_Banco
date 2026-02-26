<?php

require_once './models/Cuenta.php';


class CuentaController
{
    public function index(): void
    {
        // 1. Obtenemos todas las cuentas del modelo
        $cuentas = (new Cuenta())->getAll();
        require './views/cuenta/index.php';
    }

    public function create(): void
    {
        $modeloCuenta = new Cuenta();

        // SI el usuario envió el formulario (POST)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Llamamos al método save del modelo Cuenta
            $modeloCuenta->save(
                $_POST['tipo_cuenta'],
                $_POST['saldo'],
                $_POST['id_cliente']
            );

            // Redirección al terminar
            header("Location: ./index.php?controller=Cuenta&accion=index");
            exit;
        }

        // Si no es POST, cargamos la vista del formulario vacío
        require './views/cuenta/create.php';
    }

    public function edit(): void
    {
        $modeloCuenta = new Cuenta();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Llamamos al modelo respetando el orden de los 5 parámetros
            $modeloCuenta->update(
                $_POST['id_cuenta'],
                $_POST['tipo_cuenta'],
                $_POST['saldo'],
                $_POST['fecha_apertura'],
                $_POST['id_cliente']
            );

            // Redirección usando tus variables de enrutador (c=Controlador, a=Acción)
            header("Location: ./index.php?c=Cuenta&a=edit");
            exit;
        }

        // Si es GET, cargamos los datos actuales para el formulario
        $id = $_GET['id'];
        $cuenta = $modeloCuenta->getById($id);
        require './views/cuenta/edit.php';
    }

    public function delete(): void
    {
        (new Cuenta())->delete($_GET['id']);
        header("Location: ./index.php?accion=index&controller=Cuenta");
        exit;
    }
}
