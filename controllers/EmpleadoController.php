<?php

require_once './models/Empleado.php';

class EmpleadoController
{
    public function index()
    {
        $empleados = (new Empleado())->getAll();
        require './views/empleados/listar.php';
    }

    public function crear()
    {
        if ($_POST) {
            (new Empleado())->save(
                $_POST['nombre'],
                $_POST['cargo'],
                $_POST['sucursal'],
                $_POST['telefono']
            );

            header("Location: ./frontController.php?&accion=index&controller=Empleado");
        }

        require './views/empleados/crear.php';
    }

    public function editar()
    {
        $e = new Empleado();

        if ($_POST) {
            $e->update(
                $_GET['id'],
                $_POST['nombre'],
                $_POST['cargo'],
                $_POST['sucursal'],
                $_POST['telefono']
            );

            header("Location: ./frontController.php?&accion=index&controller=Empleado");
        }

        $empleado = $e->getById($_GET['id']);
        require './views/empleados/editar.php';
    }

    public function eliminar()
    {
        (new Empleado())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Empleado");
    }
}