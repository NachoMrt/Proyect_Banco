<h1>Editar Cuenta #<?= $cuenta['id_cuenta'] ?></h1>

<form action="index.php?c=Cuenta&a=edit&id=<?= $cuenta['id_cuenta'] ?>" method="POST">
    <!-- Campo oculto CRÍTICO para que el controlador sepa qué ID editar -->
    <input type="hidden" name="id_cuenta" value="<?= $cuenta['id_cuenta'] ?>">

    <table border="1" cellpadding="10">
        <tr>
            <td>Tipo de Cuenta:</td>
            <td>
                <select name="tipo_cuenta">
                    <option value="Ahorro" <?= $cuenta['tipo_cuenta'] == 'Ahorro' ? 'selected' : '' ?>>Ahorro</option>
                    <option value="Corriente" <?= $cuenta['tipo_cuenta'] == 'Corriente' ? 'selected' : '' ?>>Corriente</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Saldo:</td>
            <td><input type="number" step="0.01" name="saldo" value="<?= $cuenta['saldo'] ?>"></td>
        </tr>
        <tr>
            <td>Fecha Apertura:</td>
            <td><input type="date" name="fecha_apertura" value="<?= $cuenta['fecha_apertura'] ?>"></td>
        </tr>
        <tr>
            <td>ID Cliente:</td>
            <td><input type="number" name="id_cliente" value="<?= $cuenta['id_cliente'] ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Guardar Cambios</button>
                <a href="index.php?c=Cuenta&a=index">Cancelar</a>
            </td>
        </tr>
    </table>
</form>

