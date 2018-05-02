<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
<div class="content">
    <p>Processed rows - <?php echo $total ?></p>
    <p>Incorrect rows - <?php echo $incorrect ?></p>
    <p>Added users - <?php echo $added ?></p>
    <p>Updated users - <?php echo $updated ?></p>
    <p><a href="/admin/users/add">Add another one user</a></p>
    <p><a href="/admin/users">See the list of users</a></p>
</div>
<?php include dirname(__DIR__,4) . '/Common/Resources/templates/admin/footer.php' ?>
