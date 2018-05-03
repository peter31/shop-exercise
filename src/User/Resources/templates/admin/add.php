<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
<div class="content">
<form  action="/admin/users/add_action" method="POST">
    <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

    <p>Name:</p>
    <input name="name" value="<?php echo $user['name'] ?? '' ?>" placeholder="name" required1/>
    <p>Email:</p>
    <input type="text" name="email" value="<?php echo $user['email'] ?? '' ?>" placeholder="example@mail.com" required/>
    <p>Password:</p>
    <input type="password" name="password" value="<?php echo $user['password'] ?? '' ?>" placeholder="password" required/>
    <p>Status:
        <input type="hidden" name="status" value="0">
        <input type="checkbox" name="status" value="1" <?php echo isset($user['status']) && $user['status'] ? 'checked' : '' ?>/>
    </p>
    <button>Submit</button>
</form>
</div>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
