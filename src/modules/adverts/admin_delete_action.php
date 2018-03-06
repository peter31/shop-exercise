<?php

require_once dirname(__DIR__, 2) . '/functions.php';

$id = $_GET['id'];

$accessDB = openDB();

$deleteAdvert = 'DELETE FROM adverts WHERE id = "' . $id . '"';

mysqli_query($accessDB, $deleteAdvert);

mysqli_close($accessDB);

$userResultString = 'Advert was deleted';

include dirname(__DIR__, 2) . '/templates/adverts/add_action.php';