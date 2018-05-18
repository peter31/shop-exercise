<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form  action="/admin/users/add_action" method="POST">

    <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" name="name" value="<?php echo $user['name'] ?? '' ?>" placeholder="name" required/>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" value="<?php echo $user['email'] ?? '' ?>" placeholder="example@mail.com" required/>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input class="form-control" type="password" name="password" value="<?php echo $user['password'] ?? '' ?>" placeholder="password" required/>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="status" value="0"/>

                <input id="user-status" class="form-check-input" type="checkbox" name="status" value="1" <?php echo isset($user['status']) && !$user['status'] ? '' : 'checked' ?>/>
                <label class="form-check-label" for="user-status">Status</label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary mb-2">Submit</button>
        </div>

    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
