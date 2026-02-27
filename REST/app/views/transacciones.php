
<!DOCTYPE html>
<html>
<body>

<!-- GET -->
<h1> Lista de transacciones </h1>
<ul id="lista"></ul>
<script>
fetch('http://localhost/Certificado/Proyect_Banco/REST/public/index.php/transacciones')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(transaccion => {
      lista.innerHTML += `<li>${transaccion.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
<form id="formulario">
  <input type="number" name="id_transaccion" placeholder="numero de la transaccion">
  <input type="date" name="fecha" placeholder="fecha de la transaccion">
  <input type="text" name="tipo" placeholder="tipo de la transaccion">
  <input type="number" name="monto" placeholder="monto">
  <input type="number" name="id_cuenta" placeholder="id cuenta">

  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('public/index.php/transacciones', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id_transaccion: this.id_transaccion.value,
      fecha: this.fecha.value,
      tipo: this.tipo.value,
      monto: this.monto.value,
      id_cuenta: this.id_cuenta.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar transaccion </h2>
<form id="formUpdate">
 
  <input type="date" name="fecha" placeholder="fecha de la transaccion">
  <input type="text" name="tipo" placeholder="tipo de la transaccion">
  <input type="number" name="monto" placeholder="monto">
  <input type="number" name="id_cuenta" placeholder="id cuenta">
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id_transaccion = this.id_transaccion.value;

  fetch(`/Certificado/Proyect_Banco/REST/public/index.php/transacciones/${id_transaccion}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      fecha: this.fecha.value,
      tipo: this.tipo.value,
      monto: this.monto.value,
      id_cuenta: this.id_cuenta.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("transaccion actualizado:", data);
    alert("transaccion actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar transaccion </h2>
<input type="number" id="idEliminar" placeholder="ID transaccion">
<button onclick="eliminarTransaccion()"> Eliminar </button>
<script>
function eliminarTransaccion() {

  const id_transaccion = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/Proyect_Banco/REST/public/index.php/transacciones/${id_transaccion}`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("transaccion eliminado:", data);
    alert("transaccion eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>


</body>
</html>
