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
    // Instanciamos el modelo
        $modeloCliente = new Cliente();

    // Si el usuario envió el formulario (POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Llamamos al método insertar del modelo
        // Asegúrate de que los nombres coincidan con los 'name' de tu vista
            $modeloCliente->save(
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['DNI'],
                $_POST['teléfono'],
                $_POST['dirección']
            );

            // Al terminar, volvemos a la lista principal
            header("Location: ./frontController.php?controller=Cliente&accion=index");
            exit;
        }

        // 3. Si no es POST, simplemente cargamos la vista del formulario vacío
        require './views/cliente/crear.php';
    }

    public function editar()
    {
        // 1. Instanciamos el modelo correctamente
        $modeloCliente = new Cliente();

        // Si recibimos datos por POST, procesamos la actualización
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $modeloCliente->update(
                $_GET['id'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['DNI'],      //DNI en mayúsculas como SQL
                $_POST['telefono'],
                $_POST['direccion']
            );

            // Redirección al terminar de editar
            header("Location: ./frontController.php?controller=Cliente&accion=index");
            exit; // Siempre poner exit después de un header Location
        }

        // Si es una petición GET, buscamos al cliente para mostrarlo en la vista
        $cliente = $modeloCliente->getById($_GET['id']);

        // Cargamos vista edicion
        require './views/cliente/editar.php';
    }

    public function eliminar()
    {
        (new Cliente())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Cliente");
    }
}
