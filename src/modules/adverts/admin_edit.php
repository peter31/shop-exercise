<?php

require dirname(__DIR__, 2) . '/functions.php';

$id = ($_GET['id']);

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string($accessDB, $id) . '"';
$user = mysqli_fetch_assoc(mysqli_query($accessDB, $sqlQuery));
mysqli_close($accessDB);

include dirname(__DIR__, 2) . '/templates/adverts/edit.php';