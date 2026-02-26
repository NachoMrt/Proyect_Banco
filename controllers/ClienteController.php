<?php

require_once 'models/Cliente.php';

class ClienteController
{
    public function index()
    {
        $clientes = (new Cliente())->getAll();
        require 'views/cliente/index.php';
    }

    public function crear()
    {
        if ($_POST) {
            (new Cliente())->save(
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['dni'],
                $_POST['telefono'],
                $_POST['direccion']
            );

            header("Location: ./frontController.php?&accion=index&controller=Cliente");
        }

        require './views/clientes/crear.php';
    }

    public function editar()
    {
        $c = new Cliente();

        if ($_POST) {
            $c->update(
                $_GET['id'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['dni'],
                $_POST['telefono'],
                $_POST['direccion']
            );

            header("Location: ./frontController.php?&accion=index&controller=Cliente");
        }

        $cliente = $c->getById($_GET['id']);
        require './views/clientes/editar.php';
    }

    public function eliminar()
    {
        (new Cliente())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Cliente");
    }
}