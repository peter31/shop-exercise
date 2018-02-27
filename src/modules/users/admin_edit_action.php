<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$id = $_POST['id'];
$email = $_POST['email'];
$user = $_POST['user'];

$accessDB = openDB();

$editUser = 'UPDATE users SET name = "' . mysqli_real_escape_string($accessDB, $user) . '", email = "' . mysqli_real_escape_string($accessDB, $user) . '" WHERE id = "' . $id . '"';

mysqli_query($accessDB, $editUser);

mysqli_close($accessDB);

$userResultString = 'User was deleted';

include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';