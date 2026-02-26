<h1>Editar Datos del Cliente</h1>

<form action="index.php?controller=cliente&action=update" method="POST">
    
    <input type="hidden" name="id_cliente" value="<?= $cliente->id_cliente ?>">

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td><strong>ID Cliente:</strong></td>
            <td><?= $cliente->id_cliente ?> (No editable)</td>
        </tr>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>
                <input type="text" name="nombre" value="<?= htmlspecialchars($cliente->nombre) ?>" required>
            </td>
        </tr>
        <tr>
            <td><strong>Apellido:</strong></td>
            <td>
                <input type="text" name="apellido" value="<?= htmlspecialchars($cliente->apellido) ?>" required>
            </td>
        </tr>
        <tr>
            <td><strong>DNI:</strong></td>
            <td>
                <input type="text" name="DNI" value="<?= htmlspecialchars($cliente->DNI) ?>" required>
            </td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td>
                <input type="number" name="telefono" value="<?= $cliente->teléfono ?>" required>
            </td>
        </tr>
        <tr>
            <td><strong>Dirección:</strong></td>
            <td>
                <input type="text" name="direccion" value="<?= htmlspecialchars($cliente->dirección) ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Actualizar Cliente</button>
                <a href="index.php?controller=cliente&action=index">Cancelar y Volver</a>
            </td>
        </tr>
    </table>
</form>