<?php
header('Content-Type: application/json');

// Lógica de datos del sistema manejada en PHP
$response = [
    'meses' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
    'ventas' => [4200, 5900, 6800, 7500, 9100, 11200],
    'productos' => [12, 19, 15, 22, 30, 25],
    'kpis' => [
        'ventas_totales' => '$24,800',
        'productos_activos' => '142',
        'distribucion_pedidos' => '89% Entregados'
    ]
];

echo json_encode($response);