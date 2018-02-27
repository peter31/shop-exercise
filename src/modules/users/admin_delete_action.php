<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$id = $_POST['id'];

$accessDB = openDB();

$deleteUser = 'DELETE FROM users WHERE id = "' . $id . '"';

mysqli_query($accessDB, $deleteUser);

mysqli_close($accessDB);

$userResultString = 'User was changed';

include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';