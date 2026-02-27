const tbody = document.querySelector('.tbody_container');

const getAllEmpleados = async () => {
    fetch('http://localhost/Certificado/Proyect_Banco/REST/public/index.php/empleados')
        .then(res => res.json())
        .then(data => {
            data.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${item.id_empleado}</td>
                                <td>${item.nombre}</td>
                                <td>${item.cargo}</td>
                                <td>${item.sucursal}</td>
                                <td>${item.telefono}</td>
                                <td><button class="edit_empl" data-id="${item.id_empleado}">Editar</button>
                                    <button class="borrar_empl" data-id="${item.id_empleado}">Borrar</button>
                                </td>`;
                tbody.appendChild(tr);
            })
        })
}

getAllEmpleados();

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("edit_empl")) {
        const editContainer = document.querySelector('.edit_container');
        const id = e.target.dataset.id;
        fetch(`http://localhost/Certificado/Proyect_Banco/REST/public/index.php/empleados/${id}`)
            .then(res => res.json())
            .then(data => {
                editContainer.innerHTML = `
                <h3>Editar Empleado</h3>
                <form id="editForm">
                    <input type="hidden" id="edit_id" value="${data.id_empleado}">

                    <label>Nombre:</label>
                    <input type="text" id="edit_nombre" value="${data.nombre}" required>

                    <label>Cargo:</label>
                    <input type="text" id="edit_cargo" value="${data.cargo}" required>
                    
                    <label>Sucursal:</label>
                    <input type="text" id="edit_sucursal" value="${data.sucursal}" required>

                    <label>Telefono:</label>
                    <input type="text" id="edit_telefono" value="${data.telefono}" required>

                    <button type="submit">Actualizar</button>
                </form>
            `;
            })
    }

    if (e.target.classList.contains("borrar_empl")) {
        const id = e.target.dataset.id;
        fetch(`http://localhost/Certificado/Proyect_Banco/REST/public/index.php/empleados/${id}`, {
            method: "DELETE"
        })
            .then(res => res.json())
            .then(data => {
                alert("Cliente eliminado correctamente");
                tbody.innerHTML = "";
                getAllEmpleados();
            })
    }
})

document.addEventListener("submit", async (e) => {

    if (e.target.id === "editForm") {
        e.preventDefault();

        const id = document.querySelector("#edit_id").value;
        const nombre = document.querySelector("#edit_nombre").value;
        const cargo = document.querySelector("#edit_cargo").value;
        const sucursal = document.querySelector("#edit_sucursal").value;
        const telefono = document.querySelector("#edit_telefono").value;

        fetch(
            `http://localhost/Certificado/Proyect_Banco/REST/public/index.php/empleados/${id}`,
            {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ nombre, cargo, sucursal, telefono })
            }
        )
            .then(res => res.json())

        document.querySelector('.edit_container').innerHTML = "";
        tbody.innerHTML = "";
        getAllEmpleados();
    }

    if (e.target.id === "createForm") {
        e.preventDefault();

        const nombre = document.querySelector("#crear_nombre").value;
        const cargo = document.querySelector("#crear_cargo").value;
        const sucursal = document.querySelector("#crear_sucursal").value;
        const telefono = document.querySelector("#crear_telefono").value;

        await fetch(
            `http://localhost/Certificado/Proyect_Banco/REST/public/index.php/empleados`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ nombre, cargo, sucursal, telefono })
            }
        )
        e.target.reset();
        tbody.innerHTML = "";
        getAllEmpleados();
    }
});