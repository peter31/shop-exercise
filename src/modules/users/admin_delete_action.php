<?php

require_once dirname(__DIR__, 2) . '/functions.php';

$id = $_GET['id'];

$accessDB = openDB();

$deleteUser = 'DELETE FROM users WHERE id = "' . $id . '"';

mysqli_query($accessDB, $deleteUser);

mysqli_close($accessDB);

$userResultString = 'User was deleted';

include dirname(__DIR__, 2) . '/templates/users/add_action.php';