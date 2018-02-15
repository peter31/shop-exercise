<?php
// Страница пользователей ...
if ($_SERVER['REQUEST_URI'] === '/admin/users') {
    require dirname(__DIR__) . '/src/users.php';
}
// Страница добавления пользователя через форму ...
if ($_SERVER['REQUEST_URI'] === '/admin/users/add') {
    require dirname(__DIR__) . '/src/users_add.php';
}

// Добавления пользователя ...
if ($_SERVER['REQUEST_URI'] === '/admin/users/add_action') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require dirname(__DIR__) . '/src/users_add_action.php';
    }
}

// Страница добавления пользователя(ей) путём загрузки CSV файла ...
if ($_SERVER['REQUEST_URI'] === '/admin/users/csv') {
    require dirname(__DIR__) . '/src/users_csv.php';
}

// Загрузка файла CSV ...
if ($_SERVER['REQUEST_URI'] === '/admin/users/csv_action') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require dirname(__DIR__) . '/src/users_csv_action.php';
    }
}
