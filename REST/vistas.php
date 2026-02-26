
<!DOCTYPE html>
<html>
<body>

<!-- GET -->
<h1> Lista de usuarios </h1>
<ul id="lista"> </ul>
<script>
fetch('http://localhost/certificado/REST/public/index.php/usuarios')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(usuario => {
      lista.innerHTML += `<li>${usuario.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
 <h2> Insetar usuario </h2>
<form id="formulario">
  <input type="text" name="nombre" placeholder="Nombre">
   <input type="email" name="email" placeholder="Email">
    <input type="number" name="edad" placeholder="Edad">
  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('http://localhost/certificado/REST/public/index.php/usuarios', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      email: this.email.value,
      edad: this.edad.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar usuario </h2>
<form id="formUpdate">
  <input type="number" name="id" placeholder="ID usuario" required><br/><br/>
  <input type="text" name="nombre" placeholder="Nuevo nombre" required>
   <input type="email" name="email" placeholder="Email nombre" required>
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id = this.id.value;

  fetch(`http://localhost/certificado/REST/public/index.php/usuario1/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id: this.id.value,
      nombre: this.nombre.value,
      email: this.email.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("Usuario actualizado:", data);
    alert("Usuario actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar usuario </h2>
<input type="number" id="idEliminar" placeholder="ID usuario">
<button onclick="eliminarUsuario()"> Eliminar </button>
<script>
function eliminarUsuario() {

  const id = document.getElementById("idEliminar").value;

  fetch(`http://localhost/certificado/REST/public/index.php/usuario1/${id}`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("Usuario eliminado:", data);
    alert("Usuario eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>


</body>
</html>
