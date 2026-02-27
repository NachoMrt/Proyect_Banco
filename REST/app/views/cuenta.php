
<!DOCTYPE html>
<html>
<body>

<!-- GET -->
<h1> Lista de cuentas </h1>
<ul id="lista"></ul>
<script>
fetch('http://localhost/Certificado/Proyect_Banco/REST/public/index.php/cuentas')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(cuenta => {
      lista.innerHTML += `<li>${cuenta.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
<form id="formulario">
  <input type="number" name="id_cuenta" placeholder="numero de la cuenta">
  <input type="text" name="tipo_cuenta" placeholder="El tipo de la cuenta">
  <input type="number" name="saldo" placeholder="saldo">
  <input type="date" name="fecha_apertura" placeholder="2000-01-01">
  <input type="number" name="id_cliente" placeholder="id cliente">

  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('public/index.php/cuentas', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id_cuenta: this.id_cuenta.value,
      tipo_cuenta: this.tipo_cuenta.value,
      saldo: this.saldo.value,
      fecha_apertura: this.fecha_apertura.value,
      id_cliente: this.id_cliente.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar cuenta </h2>
<form id="formUpdate">
 
  <input type="text" name="tipo_cuenta" placeholder="El tipo de la cuenta">
  <input type="number" name="saldo" placeholder="saldo">
  <input type="date" name="fecha_apertura" placeholder="2000-01-01">
  <input type="number" name="id_cliente" placeholder="id cliente">
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id_cuenta = this.id_cuenta.value;

  fetch(`/Certificado/Proyect_Banco/REST/public/index.php/cuentas/${id_cuenta}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      tipo_cuenta: this.tipo_cuenta.value,
      saldo: this.saldo.value,
      fecha_apertura: this.fecha_apertura.value,
      id_cliente: this.id_cliente.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("cuenta actualizado:", data);
    alert("cuenta actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar cuenta </h2>
<input type="number" id="idEliminar" placeholder="ID cuenta">
<button onclick="eliminarCuenta()"> Eliminar </button>
<script>
function eliminarCuenta() {

  const id_cuenta = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/Proyect_Banco/REST/public/index.php/cuentas/${id_cuenta}`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("Cuenta eliminado:", data);
    alert("Cuenta eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>


</body>
</html>
