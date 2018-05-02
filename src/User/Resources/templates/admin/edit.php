<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
    <div class="content">
        <form action="/admin/users/edit_action" method="POST">
            <p><?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?></p>
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
            <p>Name:</p>
            <input type="text" name="name" placeholder="name" value="<?php echo $user['name'] ?>" required/>
            <p>Email:</p>
            <input type="email" name="email" placeholder="example@mail.com" value="<?php echo $user['email'] ?>" required/>
            <p>Password:</p>
            <input type="password" name="password" placeholder="user" value="<?php echo $user['password'] ?>" required/>
            <p>Status:
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" <?php echo isset($user['status']) && $user['status'] ? 'checked' : '' ?>/>
            </p>
            <button>Submit</button>
        </form>
    </div>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
