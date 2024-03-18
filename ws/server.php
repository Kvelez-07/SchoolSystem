<?php

require_once "controller/Control.php";

$http_method = $_SERVER['REQUEST_METHOD'];

switch ($http_method) {
    case 'GET':
    case 'POST':
    case 'PUT':
        handleRequest();
        break;
    default:
        runDefault();
        break;
}

function handleRequest() {
    header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, X-Requested-With");
    $controller = new Control();
    $controller->framework_manager();
}

function runDefault() {
    header("HTTP/1.1 405 Method Not Allowed");
}