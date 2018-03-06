<?php

require_once dirname(__DIR__, 2) . '/functions.php';

$errors = advertAddValidation($_POST);

$accessDB = openDB();

if (count($errors) > 0) {

    include dirname(__DIR__, 2) . '/templates/adverts/add.php';

} else {

    $addAdvert =
        'INSERT INTO adverts SET
         title = "' . mysqli_real_escape_string($accessDB, $_POST['title']) . '",
         message = "' . mysqli_real_escape_string($accessDB, $_POST['message']) . '",
         phone = "' . mysqli_real_escape_string($accessDB, $_POST['phone']) . '"';

    mysqli_query($accessDB, $addAdvert);

    $userResultString = 'Advert is added';

    include dirname(__DIR__, 2) . '/templates/adverts/add_action.php';
}

mysqli_close($accessDB);
