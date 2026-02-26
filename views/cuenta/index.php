<h1>Lista de Cuentas</h1>

<!-- Botón para crear una nueva cuenta -->
<a href="index.php?controller=cuenta&action=create">Agregar Cuenta</a>

<!-- Tabla de cuentas -->
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID Cuenta</th>
            <th>Tipo de Cuenta</th>
            <th>Saldo</th>
            <th>Fecha Apertura</th>
            <th>ID Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cuentas as $cuenta): ?>
            <tr>
                <td><?= $cuenta['id_cuenta'] ?></td>
                <td><?= $cuenta['tipo_cuenta'] ?></td>
                <td><?= number_format($cuenta['saldo'], 2) ?> €</td>
                <td><?= $cuenta['fecha_apertura'] ?></td>
                <td><?= $cuenta['id_cliente'] ?></td>
                <td>
                    <a href="index.php?controller=cuenta&action=edit&id=<?= $cuenta['id_cuenta'] ?>">Editar</a> |
                    <a href="index.php?controller=cuenta&action=delete&id=<?= $cuenta['id_cuenta'] ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta cuenta?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>