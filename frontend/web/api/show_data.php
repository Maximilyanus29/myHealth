<?php
// Устанавливаем заголовки для обработки JSON
header('Content-Type: application/json');

// Путь к файлу, из которого будем считывать данные
$filePath = 'health_data.json';

// Проверяем, существует ли файл
if (file_exists($filePath)) {
    // Читаем содержимое файла
    $data = file_get_contents($filePath);
    
    // Проверяем, удалось ли прочитать данные
    if ($data !== false) {
        // Возвращаем данные с успешным статусом
        echo json_encode(['status' => 'success', 'data' => json_decode($data, true)]);
    } else {
        // Возвращаем ошибку, если не удалось прочитать данные
        echo json_encode(['status' => 'error', 'message' => 'Не удалось прочитать данные из файла.']);
    }
} else {
    // Возвращаем ошибку, если файл не существует
    echo json_encode(['status' => 'error', 'message' => 'Файл не найден.']);
}
