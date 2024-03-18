<?php

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
    require_once "index.php"; // controller
}

function runDefault() {
    header("HTTP/1.1 405 Method Not Allowed");
}