<?php
header("Content-Type: application/json");

// Simulación de base de datos de usuarios
$users = [
    'admin' => [
        'password' => password_hash('admin123', PASSWORD_BCRYPT),
        'name' => 'Administrador',
        'role' => 'admin'
    ],
    'usuario' => [
        'password' => password_hash('natura2025', PASSWORD_BCRYPT),
        'name' => 'Usuario Natura',
        'role' => 'user'
    ]
];

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data['username']) && isset($data['password'])) {
    $username = $data['username'];
    $password = $data['password'];
    
    if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
        session_start();
        $_SESSION['user'] = [
            'username' => $username,
            'name' => $users[$username]['name'],
            'role' => $users[$username]['role']
        ];
        
        echo json_encode(['success' => true]);
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Credenciales inválidas']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud inválida']);
}
?>