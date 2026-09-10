<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once __DIR__ . '/../classes/Productos.php';

$repositorio = new Productos();
$productos = $repositorio->obtenerTodos();

$catalogo = array_map(
    fn(Producto $producto) => $producto->toArray(),
    $productos
);

echo json_encode([
    'exito' => true,
    'productos' => $catalogo
]);