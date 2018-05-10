<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form action="/admin/users/edit_action" method="POST">

        <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" placeholder="name" value="<?php echo $user['name'] ?>" required/>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" placeholder="example@mail.com" value="<?php echo $user['email'] ?>" required/>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" placeholder="user" value="<?php echo $user['password'] ?>" required/>
        </div>

        <div class="form-group">
            <input type="hidden" name="status" value="0"/>

            <label class="form-check-label" for="user-status">Status</label>
            <input type="checkbox" id="user-status" name="status" value="1" <?php echo isset($item['status']) && $item['status'] ? 'checked' : '' ?>/>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />

            <button class="btn btn-primary mb-2">Submit</button>
        </div>

    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
