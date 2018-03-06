<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$id = ($_GET['id']);

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string($accessDB, $id) . '"';
$sqlData = mysqli_fetch_assoc(mysqli_query($accessDB, $sqlQuery));
mysqli_close($accessDB);

$id = $sqlData['id'];
$title = $sqlData['title'];
$message = $sqlData['message'];
$phone = $sqlData['phone'];
$status = $sqlData['status'];

include dirname(__DIR__, 2) . '/templates/adverts/edit.php';