<?php
// Устанавливаем заголовки для обработки JSON
header('Content-Type: application/json');

// Получаем данные из POST-запроса
$data = json_decode(file_get_contents('php://input'), true);

// Проверяем, что данные были получены
if ($data) {
    // Путь к файлу, куда будут сохраняться данные
    $filePath = 'health_data.json';

    // Если файл существует, загружаем существующие данные
    if (file_exists($filePath)) {
        $existingData = json_decode(file_get_contents($filePath), true);
    } else {
        $existingData = [];
    }
    

    // Добавляем новые данные к существующим
    $existingData[] = $data;

    // Сохраняем обновленные данные обратно в файл
    if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
        // Возвращаем успешный ответ
        echo json_encode(['status' => 'success', 'message' => 'Данные успешно сохранены.']);
    } else {
        // Возвращаем ошибку, если не удалось сохранить данные
        echo json_encode(['status' => 'error', 'message' => 'Не удалось сохранить данные.']);
    }
} else {
    // Возвращаем ошибку, если данные не были получены
    echo json_encode(['status' => 'error', 'message' => 'Нет данных для сохранения.']);
}
?>
