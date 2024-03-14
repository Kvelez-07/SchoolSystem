<?php

$http_method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch($http_method) {
    case 'GET':
        runGET();
        break;
    case 'POST':
        runPOST();
        break;
    case 'PUT':
        runPUT();
        break;
    default:
        runDefault();
        break;
}

function runGET() {
    header("HTTP/1.1 200 OK");
    echo "Hello GET"; // usually echoes instead of returning
}

function runPOST() {
    header("HTTP/1.1 200 OK");
    echo "Hello POST";
}

function runPUT() {
    header("HTTP/1.1 200 OK");
    echo "Hello PUT";
}

function runDefault() {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Method Not Allowed";
}