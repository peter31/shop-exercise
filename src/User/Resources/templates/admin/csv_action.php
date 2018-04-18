<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
<div class="content">
    <p>Обработано пользователей - <?php echo $total ?></p>
    <p>Добавленных пользователей - <?php echo $added ?></p>
    <p>Обновленных пользователей - <?php echo $updated ?></p>
    <p><a href="/admin/users/add">Add another one user</a></p>
    <p><a href="/admin/users">See the list of users</a></p>
</div>
<?php include dirname(__DIR__,4) . '/Common/Resources/templates/admin/footer.php' ?>
