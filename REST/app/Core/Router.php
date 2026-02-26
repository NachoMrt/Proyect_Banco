<?php

require_once __DIR__ . '/../Controllers/UsuarioController.php';

// Define la clase Router que se encargará de analizar la URL y el método HTTP.
class Router {
    private $controller;

    public function __construct() {
        $this->controller = new UsuarioController();
    }

    /* Este es el método principal del Router.
    Recibe:
        $method → GET, POST, PUT, DELETE
        $uri → ruta limpia (usuarios o usuarios/1)
        $data → datos del body de POST/PUT (array PHP)
    */
    public function route($method, $uri, $data=null) {
        /*
        Separa la URL en partes usando /.
            usuarios        → ['usuarios']
            usuarios/1      → ['usuarios','1']
        */
        $parts = explode('/', trim($uri,'/'));  
        if($parts[0] != 'usuarios') {
            http_response_code(404);  // Si la primera parte de la URL no es 'usuarios', devuelve 404.
                                                    // Esto evita que alguien llame a cualquier otra ruta y rompa tu API.
            echo json_encode(['mensaje'=>'Ruta no encontrada']);  // json_encode: convierte un array o un objeto PHP en una cadena JSON.
            return;
        }

        // Si hay un segundo segmento en la URL (usuarios/1), lo guarda en $id.
        //Si no existe (usuarios), $id = null.
        $id = $parts[1] ?? null;

        // Según el método HTTP, decide qué acción ejecutar en el controlador:
        switch($method) {
            case 'GET':
                $id ? $this->controller->show($id) : $this->controller->index(); // Si hay ID → muestra un usuario específico
                                                                                    // Si no → devuelve todos los usuarios
                break;
            case 'POST':
                $this->controller->store($data);
                break;
            case 'PUT':
                if(!$id) { http_response_code(400); echo json_encode(['mensaje'=>'ID requerido']); return;}
                $this->controller->update($id, $data);
                break;
            case 'DELETE':
                if(!$id) { http_response_code(400); echo json_encode(['mensaje'=>'ID requerido']); return;}
                $this->controller->delete($id);
                break;
            default:
                http_response_code(405);
                echo json_encode(['mensaje'=>'Método no permitido']);
        }
    }

}

/*
Router.php es como el centro de control de la API:
    Recibe la URL y método HTTP desde index.php
    Limpia y separa la ruta (usuarios, usuarios/1)
    Decide qué acción del controlador ejecutar
    Devuelve la respuesta JSON al usuario
    index.php → entrada
    Router.php → dirige la petición
    Controller → hace la lógica
    Modelo → accede a la BD
*/



