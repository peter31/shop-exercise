<?php

$id = $_GET['id'];

$accessDB = openDB();

$deleteUser = 'DELETE FROM users WHERE id = "' . $id . '"';

mysqli_query($accessDB, $deleteUser);

mysqli_close($accessDB);

$userResultString = 'User was deleted';

include dirname(__DIR__) . '/Templates/add_action.php';