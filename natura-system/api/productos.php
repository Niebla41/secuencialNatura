<?php
header("Content-Type: application/json");

// Simulación de base de datos de productos
$productos = [
    'P001' => [
        'nombre' => 'Crema Hidratante Ekos',
        'descripcion' => 'Crema hidratante con ingredientes naturales',
        'linea' => 'MRM 3'
    ],
    'P002' => [
        'nombre' => 'Perfume Kaiak',
        'descripcion' => 'Perfume masculino de la línea Kaiak',
        'linea' => 'MRM 5'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    
    if (isset($productos[$codigo])) {
        echo json_encode($productos[$codigo]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Producto no encontrado']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud inválida']);
}
?>