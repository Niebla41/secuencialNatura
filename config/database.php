<?php
// Este es un archivo de simulación para desarrollo
// En producción, reemplazar con conexión real a MySQL

function mock_db_query($query) {
    // Simular consulta a base de datos
    return [];
}

function mock_db_insert($table, $data) {
    // Simular inserción
    return ['id' => uniqid(), ...$data];
}
?>