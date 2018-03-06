<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$id = $_GET['id'];

$accessDB = openDB();

$deleteAdvert = 'DELETE FROM adverts WHERE id = "' . $id . '"';

mysqli_query($accessDB, $deleteAdvert);

mysqli_close($accessDB);

$userResultString = 'Advert was deleted';

include dirname(dirname(__DIR__)) . '/templates/adverts/add_action.php';