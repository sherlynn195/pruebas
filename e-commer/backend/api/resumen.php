<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once __DIR__ . '/../classes/Productos.php';

// Leer el cuerpo de la petición (JSON enviado por JS)
$entrada = json_decode(file_get_contents('php://input'), true);

if (!isset($entrada['items']) || !is_array($entrada['items'])) {
    echo json_encode([
        'exito' => false,
        'mensaje' => 'No se recibieron productos.'
    ]);
    exit;
}

$repositorio = new Productos();
$detalle = [];
$total = 0.0;

foreach ($entrada['items'] as $item) {
    $id = isset($item['id']) ? (int)$item['id'] : 0;
    $cantidad = isset($item['cantidad']) ? (int)$item['cantidad'] : 0;

    if ($cantidad <= 0) {
        continue;
    }

    $producto = $repositorio->obtenerPorId($id);

    if ($producto === null) {
        continue; // producto inválido, se ignora
    }

    // No permitir comprar más de lo que hay en existencias
    if ($cantidad > $producto->getExistencias()) {
        $cantidad = $producto->getExistencias();
    }

    if ($cantidad <= 0) {
        continue;
    }

    // El precio SIEMPRE se toma del catálogo del servidor, nunca del cliente
    $subtotal = round($producto->getPrecio() * $cantidad, 2);

    $detalle[] = [
        'id' => $producto->getId(),
        'nombre' => $producto->getNombre(),
        'precio' => $producto->getPrecio(),
        'cantidad' => $cantidad,
        'subtotal' => $subtotal
    ];

    $total += $subtotal;
}

$total = round($total, 2);

echo json_encode([
    'exito' => true,
    'detalle' => $detalle,
    'total' => $total
]);