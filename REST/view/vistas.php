
<!DOCTYPE html>
<html>
<body>

<a href='../index.php'> VOLVER a INICIO </a><br/>
<h1> PRIMERO LOgueate para utilizar REST </h1>
<h2> LOGIN </h2>
<form id="formuLogin" method="POST">
  <input type="email" name="emailLg" placeholder="Email"><br/><br/>
  <input type="password" name="passwordLg" placeholder="Password"><br><br/>
  <button type="submit"> Logearte </button>
</form>
<script>
const formLg = document.getElementById("formuLogin");
formLg.addEventListener("submit", function(e){
  e.preventDefault();
	
  fetch('http://localhost/Certificado/PHP/6-crud-mvc-rest/REST/public/index.php/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
	  email: this.emailLg.value,
	  password: this.passwordLg.value
    })
  })
  .then(res => res.json())
  .then(data => localStorage.setItem('token', data.token))
  .then(() => { formLg.reset(); })
});
</script>
<br/>

<!-- GET -->
<h1> Lista de usuarios </h1>
<ul id="lista"></ul>
<script>
const token = localStorage.getItem('token');
fetch('http://localhost/Certificado/PHP/6-crud-mvc-rest/REST/public/index.php/usuarios', {
		method: 'GET',
		headers: { 
			'Authorization' : `Bearer: {$token}`,
			'Content-Type' : 'aplication/json'
		}
	})
	.then(response => response.json())
	.then(data => {
		const lista = document.getElementById('lista');
		data.forEach(usuario => {
			lista.innerHTML += `<li>${usuario.nombre}</li>`;
		});
	});
</script>


<!-- POST -->
<h2> Insertar usuario </h2>
<form id="formulario" method="POST">
  <input type="text" name="nombre" placeholder="Nombre"><br/><br/>
  <input type="email" name="email" placeholder="Email"><br/><br/>
  <input type="password" name="password" placeholder="Password"><br><br/>
  <button type="submit"> Guardar </button>
</form>
<script>
const form = document.getElementById("formulario");
form.addEventListener("submit", function(e){
  e.preventDefault();

  fetch('http://localhost/Certificado/PHP/6-crud-mvc-rest/REST/public/index.php/usuarios', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
	  email: this.email.value,
	  password: this.password.value
    })
  })
  .then(() => { form.reset(); })
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
const formUd = document.getElementById("formUpdate");
formUd.addEventListener("submit", function(e){
  e.preventDefault();

  const id = this.id.value;
  
  fetch(`http://localhost/Certificado/PHP/6-crud-mvc-rest/REST/public/index.php/usuarios/${id}`, {
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
  .then(() => { formUd.reset(); })
  .catch(error => console.error("Error:", error));
});
document.getElementById("formUpdate").reset();
</script>


<!-- DELETE -->
<h2> Eliminar usuario </h2>
<input type="number" id="idEliminar" placeholder="ID usuario">
<button onclick="eliminarUsuario()"> Eliminar </button>
<script>
function eliminarUsuario() {

  const id = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/PHP/6-crud-mvc-rest/REST/public/index.php/usuarios/${id}`, {
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
<br/><br/>

</body>
</html>
