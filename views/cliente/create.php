<h1>Agregar Nuevo Cliente</h1>

<form action="index.php?controller=cliente&action=store" method="POST">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td><strong>Nombre:</strong></td>
            <td><input type="text" name="nombre" required></td>
        </tr>
        <tr>
            <td><strong>Apellido:</strong></td>
            <td><input type="text" name="apellido" required></td>
        </tr>
        <tr>
            <td><strong>DNI:</strong></td>
            <td><input type="text" name="DNI" required></td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td><input type="text" name="telefono"></td>
        </tr>
        <tr>
            <td><strong>Dirección:</strong></td>
            <td><input type="text" name="direccion"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Guardar Cliente</button>
                <a href="index.php?controller=cliente&action=index">Cancelar</a>
            </td>
        </tr>
    </table>
</form>