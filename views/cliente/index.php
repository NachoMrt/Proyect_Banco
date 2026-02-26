<h1>Lista de Clientes</h1>

<!-- Botón para crear un nuevo cliente -->
<a href="index.php?controller=cliente&action=create">Agregar Cliente</a>

<!-- Tabla de clientes -->
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente->id_cliente ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->apellido ?></td>
                <td><?= $cliente->DNI ?></td>
                <td><?= $cliente->teléfono ?></td>
                <td><?= $cliente->dirección ?></td>
                <td>
                    <a href="index.php?controller=cliente&action=edit&id=<?= $cliente->id_cliente ?>">Editar</a> |
                    <a href="index.php?controller=cliente&action=delete&id=<?= $cliente->id_cliente ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>