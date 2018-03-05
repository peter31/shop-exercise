<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$errors = advertAddValidation($_POST);

var_dump($_POST);
die;

$accessDB = openDB();

if (count($errors) > 0) {

    include dirname(dirname(__DIR__)) . '/templates/adverts/add.php';

} else {

    $addAdvert =
        'INSERT INTO adverts SET
         header = "' . mysqli_real_escape_string($accessDB, $_POST['header']) . '",
         message = "' . mysqli_real_escape_string($accessDB, $_POST['message']) . '",
         phone = "' . mysqli_real_escape_string($accessDB, $_POST['phone']) . '"';

    mysqli_query($accessDB, $addAdvert);

    $userResultString = 'Advert is added';

    include dirname(dirname(__DIR__)) . '/templates/adverts/add_action.php';
}

mysqli_close($accessDB);