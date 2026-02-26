<?php

// 1- Selecciono el controlador:
 // Lee ?c= de la URL.
  // Si no existe, usa Usuario por defecto.
$c = $_GET['controller'] ?? 'Cliente';
// 2- Selecciono la acción:
 // Lee ?a= de la URL.
  // Si no existe, llama a index().
$a = $_GET['action'] ?? 'index';

// 3- Carga el controlador:
// Incluye el archivo del controlador elegido.
require_once 'controllers/' . $c . 'Controller.php';

// 4- Crea la instancia:
 // Construye el nombre de la clase dinámicamente.
  // Crea el objeto controlador.
$controllerName = $c . 'Controller';
$controller = new $controllerName();
// 5- Ejecuta la acción:
 // Llama al método indicado (index, crear, editar, etc.).
$controller->$a();

