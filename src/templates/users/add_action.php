<?php include dirname(__DIR__) . '/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
    <p><b><?php echo $userResultString ?></b></p>
    <p><a href='/admin/users/add'>Add another one user</a></p>
    <p><a href='/admin/users'>Return to the list of users</a></p>

<?php include dirname(__DIR__) . '/footer.php' ?>