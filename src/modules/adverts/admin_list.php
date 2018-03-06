<?php

require dirname(__DIR__, 2) . '/functions.php';

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM adverts';
$sqlData = mysqli_query($accessDB, $sqlQuery);

$adverts = [];
while ($advert = mysqli_fetch_assoc($sqlData)) {
    $adverts[] = $advert;
}

mysqli_close($accessDB);

require dirname(__DIR__, 2) . '/templates/adverts/list.php';

