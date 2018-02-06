<?php

// ---------- валидация файла и создание массива полученных пользователей ...

$users = [];
if($_POST['Check']) {
    if($_FILES['file']['name']) {
        $result = explode('.', $_FILES['file']['name']);
        if($result[1] == 'csv') {
            $take = fopen($_FILES['file']['tmp_name'], "r");
            while(($usersRow = fgetcsv($take)) !== FALSE) {
                $users[] = $usersRow;
            }
            fclose($take);
        }
    }
}

// ---------- подключение к базе данных mysql ...

require __DIR__ . '/config.php';

$db = mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
if (!$db) {
    echo "Error creating table: " . mysqli_error($db) . "\n";
    exit;
}

// ---------- работа с базой данных mysql ...

$createTable = "CREATE TABLE users (
id int NOT NULL AUTO_INCREMENT,
name varchar(200) NOT NULL,
email varchar(200) NOT NULL,
status int(1) DEFAULT '1',
created TIMESTAMP DEFAULT NOW(),
updated TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
PRIMARY KEY (id),
UNIQUE KEY (email)
)";

if (mysqli_query($db, $createTable)) {
    echo "Таблица создана\n\n";
} else {
    echo "Ошибка: " . mysqli_error($db) . "\n\n";
}

$added = 0;
$updated = 0;
$total = 0;
foreach ($users as $key => $value) {
    $total++;
    $name = $value[0];
    $email = $value[1];
    $query = 'SELECT * FROM users WHERE email = "' . $email . '"';
    $insert = 'INSERT INTO users SET name = "' . $name . '", email = "' . $email . '"';
    $update = 'UPDATE users SET name = "' . $name . '" WHERE email = "' . $email . '"';
    if (mysqli_fetch_row(mysqli_query($db, $query)) === NULL) {
        $added++;
        mysqli_query($db, $insert);
    } else {
        mysqli_query($db, $update);
        $updated++;
    }
}
mysqli_close($db);

echo "Всего обработано пользователей - $total\n\n";
echo "Обновленных пользователей - $updated\n\n";
echo "Добавленных пользователей - $added";