<h1>Agregar Nueva Cuenta</h1>

<form action="index.php?controller=cuenta&action=create" method="POST">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td><strong>Tipo de Cuenta:</strong></td>
            <td>
                <select name="tipo_cuenta" required>
                    <option value="Ahorro">Ahorro</option>
                    <option value="Corriente">Corriente</option>
                    <option value="Nómina">Nómina</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Saldo Inicial:</strong></td>
            <td><input type="number" step="0.01" name="saldo" required></td>
        </tr>
        <tr>
            <td><strong>Fecha de Apertura:</strong></td>
            <td><input type="date" name="fecha_apertura" value="<?php echo date('Y-m-d'); ?>" required></td>
        </tr>
        <tr>
            <td><strong>ID Cliente (Titular):</strong></td>
            <td><input type="number" name="id_cliente" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Guardar Cuenta</button>
                <a href="index.php?controller=cuenta&action=index">Cancelar</a>
            </td>
        </tr>
    </table>
</form>
