<h1>Lista de Cuentas</h1>

<!-- Botón para crear una nueva cuenta -->
<a href="index.php?controller=cuenta&action=create">Agregar Cuenta</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número de Cuenta</th>
            <th>Saldo</th>
            <th>Tipo de Cuenta</th>
            <th>ID Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($cuentas)): ?>
            <?php foreach($cuentas as $cuenta): ?>
            <tr>
                <td><?= $cuenta->id_cuenta ?></td>
                <td><?= $cuenta->numero_cuenta ?></td>
                <td>$<?= number_format($cuenta->saldo, 2) ?></td>
                <td><?= $cuenta->tipo_cuenta ?></td>
                <td><?= $cuenta->id_cliente ?></td>
                <td>
                    <a href="index.php?controller=cuenta&action=edit&id=<?= $cuenta->id_cuenta ?>">Editar</a> | 
                    <a href="index.php?controller=cuenta&action=delete&id=<?= $cuenta->id_cuenta ?>" onclick="return confirm('¿Seguro que deseas eliminar esta cuenta?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No hay cuentas registradas.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
