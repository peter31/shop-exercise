<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
<div class="content">
    <p><?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?></p>
    <p><b><?php echo $userResultString ?></b></p>
    <p><a href="/admin/users/add">Add another one user</a></p>
    <p><a href="/admin/users">Return to the list of users</a></p>
</div>
<?php include dirname(__DIR__,4) . '/Common/Resources/templates/admin/footer.php' ?>