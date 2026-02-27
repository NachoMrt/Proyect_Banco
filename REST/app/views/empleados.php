<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Certificado/Proyect_Banco/REST/public/assets/css/empleados.css">
</head>

<body>
    <h1>Lista de todos empleados</h1>
    <div>
        <div class="text">
            <strong>Nuevo empleado</strong>
        </div>
        
        <form id="createForm">
            <label>Nombre:</label>
            <input type="text" id="crear_nombre" required>
            <label>Cargo:</label>
            <input type="text" id="crear_cargo" required>
            <label>Sucursal:</label>
            <input type="text" id="crear_sucursal" required>
            <label>Telefono:</label>
            <input type="text" id="crear_telefono" required>
            <button type="submit"> Guardar </button>
        </form>
    </div>
    <div class="edit_container"></div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Sucursal</th>
                <th>Telefono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tbody_container">
            <script src="/Certificado/Proyect_Banco/REST/public/assets/js/empleados.js"></script>
        </tbody>
    </table>
</body>

</html>