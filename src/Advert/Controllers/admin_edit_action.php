<?php

$errors = advertAddValidation($_POST);

$accessDB = openDB();

if (empty($_POST['id'])) {
    $errors[] = 'ID is empty';
} else {

    $sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string($accessDB, $_POST['id']) . '"';

    if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) === NULL) {
        $errors[] = 'Advert with this id does not exist';
    }
}

if (count($errors) > 0) {

    include dirname(__DIR__) . '/Templates/add.php';

} else {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    $editAdvert =
        'UPDATE adverts SET
         title = "' . mysqli_real_escape_string($accessDB, $title) . '",
         message = "' . mysqli_real_escape_string($accessDB, $message) . '",
         phone = "' . mysqli_real_escape_string($accessDB, $phone) . '",
         status = "' . mysqli_real_escape_string($accessDB, $status) . '"
         WHERE id = "' . $id . '"';

    mysqli_query($accessDB, $editAdvert);

    $userResultString = 'Advert was changed';

    include dirname(__DIR__) . '/Templates/add_action.php';
}

mysqli_close($accessDB);