<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../app/Core/Router.php';

$method = $_SERVER['REQUEST_METHOD'];   
$uri = $_SERVER['REQUEST_URI'];   
$uri = preg_replace('#^/Certificado/Proyect_Banco/REST/public(/index\.php)?#', '', $uri);
$uri = trim($uri, '/'); 

$data = json_decode(file_get_contents('php://input'), true);

$router = new Router();  
$router->route($method, $uri, $data);

