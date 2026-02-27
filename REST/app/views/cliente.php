
<!DOCTYPE html>
<html>
<body>

<!-- GET -->
<h1> Lista de clientes </h1>
<ul id="lista"></ul>
<script>
fetch('http://localhost/Certificado/Proyect_Banco/REST/public/index.php/clientes')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(cliente => {
      lista.innerHTML += `<li>${cliente.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
<form id="formulario">
  <input type="text" name="nombre" placeholder="Nombre">
  <input type="text" name="apellido" placeholder="Apellido">
  <input type="text" name="DNI" placeholder="DNI">
  <input type="number" name="telefono" placeholder="999999999">
  <input type="text" name="direccion" placeholder="la dirección completa">
  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('public/index.php/clientes', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      apellido: this.apellido.value,
      DNI: this.DNI.value,
      telefono: this.telefono.value,
      direccion: this.direccion.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar cliente </h2>
<form id="formUpdate">
  <input type="number" name="id_cliente" placeholder="ID cliente" required>
  <input type="text" name="nombre" placeholder="Nombre"> 
  <input type="text" name="apellido" placeholder="Apellido">
  <input type="text" name="DNI" placeholder="DNI">
  <input type="number" name="telefono" placeholder="999999999">
  <input type="text" name="direccion" placeholder="la dirección completa">
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id_cliente = this.id_cliente.value;

  fetch(`/Certificado/Proyect_Banco/REST/public/index.php/clientes/${id_cliente}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      apellido: this.apellido.value,
      DNI: this.DNI.value,
      telefono: this.telefono.value,
      direccion: this.direccion.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("Cliente actualizado:", data);
    alert("Cliente actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar cliente </h2>
<input type="number" id="idEliminar" placeholder="ID cliente">
<button onclick="eliminarCliente()"> Eliminar </button>
<script>
function eliminarCliente() {

  const id = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/Proyect_Banco/REST/public/index.php/clientes/${id}`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("Cliente eliminado:", data);
    alert("Cliente eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>


</body>
</html>
