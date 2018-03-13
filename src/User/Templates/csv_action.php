<?php include dirname(__DIR__, 2) . '/Common/Templates/header.php' ?>
    <p>Обработано пользователей - <?php echo $total ?></p>
    <p>Добавленных пользователей - <?php echo $added ?></p>
    <p>Обновленных пользователей - <?php echo $updated ?></p>
    <p><a href="/admin/users/add">Add another one user</a></p>
    <p><a href="/admin/users">See the list of users</a></p>
<?php include dirname(__DIR__, 2) . '/Common/Templates/footer.php' ?>
