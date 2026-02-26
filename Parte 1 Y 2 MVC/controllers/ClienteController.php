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
                $_POST['telefono'],
                $_POST['direccion']
            );

            // Al terminar, volvemos a la lista principal
            header("Location: ./index.php?controller=Cliente&action=index");
            exit;
        }

        // 3. Si no es POST, simplemente cargamos la vista del formulario vacío
        require './views/cliente/create.php';
    }

    public function updated()
    {
        $modeloCliente = new Cliente();

        // Verificamos que se haya enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Extraemos los datos del $_POST
            // Es vital que el ID venga del campo oculto 'id_cliente'
            $id = $_POST['id_cliente'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['DNI'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            // Llamamos al modelo para impactar la base de datos
            $modeloCliente->update($id, $nombre, $apellido, $dni, $telefono, $direccion);

            // Redirigimos al listado principal para ver los cambios
            header("Location: ./index.php?controller=Cliente&action=index");
            exit;
        }
    }

    public function eliminar()
    {
        (new Cliente())->delete($_GET['id']);

        header("Location: ./index.php?&accion=index&controller=Cliente");
    }
}
