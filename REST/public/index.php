<?php

// Le dice al navegador o a Postman que todo lo que devuelva este script será JSON.
 // Esto es fundamental para que tu API REST devuelva datos que se puedan interpretar automáticamente.
header('Content-Type: application/json');
require_once __DIR__ . '/../app/Core/Router.php';

$method = $_SERVER['REQUEST_METHOD'];   // Obtiene el método HTTP de la petición: GET, POST, PUT o DELETE.
$uri = $_SERVER['REQUEST_URI'];   // Obtiene la URL completa que se ha llamado, desde el host en adelante.
$uri = preg_replace('#^/certificado/REST/public(/index\.php)?#', '', $uri);
/* Quita la parte de la carpeta del proyecto y index.php de la URL.
    Resultado: solo queda la ruta relativa de tu API, por ejemplo: usuarios o usuarios/1.
    Esto hace que el Router pueda comparar correctamente $parts[0] == 'usuarios'. 
*/
$uri = trim($uri, '/'); // quita barras al inicio y final. Esto evita errores al hacer explode('/', $uri) en el Router.

// Lee el cuerpo de la petición HTTP (solo útil para POST y PUT)
 // Convierte JSON en array asociativo de PHP (true)
$data = json_decode(file_get_contents('php://input'), true);

$router = new Router();  // Crea un objeto de la clase Router para manejar la ruta.
$router->route($method, $uri, $data);

/*
Resumen:
    index.php es el punto de entrada de la API.
    Configura que todo sea JSON
    Detecta método y ruta
    Limpia la URL para el router
    Captura datos del body
    Llama al Router para que haga el CRUD correspondiente
*/

/*
    GET: http://localhost/Certficado/PHP/REST/public/index.php/usuarios
    GET: http://localhost/Certficado/PHP/REST/public/index.php/usuarios/6  -> por usuario
    POST: http://localhost/Certficado/PHP/REST/public/index.php/usuarios
        Headers:
            Content-Type: application/json
        Body ejemplo:
            {
                "nombre": "Luis",
                "email": "luis@example.com"
            }
    PUT: http://localhost/Certficado/PHP/REST/public/index.php/usuarios/3    
        Lo mismo Headers y Body
    DELETE: http://localhost/Certficado/PHP/REST/public/index.php/usuarios/3
*/






