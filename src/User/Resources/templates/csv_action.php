<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/header.php' ?>
    <p>Обработано пользователей - <?php echo $total ?></p>
    <p>Добавленных пользователей - <?php echo $added ?></p>
    <p>Обновленных пользователей - <?php echo $updated ?></p>
    <p><a href="/admin/users/add">Add another one user</a></p>
    <p><a href="/admin/users">See the list of users</a></p>
<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/footer.php' ?>
