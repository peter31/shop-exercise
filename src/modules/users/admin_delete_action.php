<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$id = $_GET['id'];

$accessDB = openDB();

$deleteUser = 'DELETE FROM users WHERE id = "' . $id . '"';

mysqli_query($accessDB, $deleteUser);

mysqli_close($accessDB);

$userResultString = 'User was deleted';

include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';