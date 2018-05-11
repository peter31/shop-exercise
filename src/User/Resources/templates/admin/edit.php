<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form action="/admin/users/edit_action" method="POST">

        <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" name="name" placeholder="name" value="<?php echo $user['name'] ?>" required/>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" placeholder="example@mail.com" value="<?php echo $user['email'] ?>" required/>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input class="form-control" type="password" name="password" placeholder="user" value="<?php echo $user['password'] ?>" required/>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="status" value="0"/>

                <input type="checkbox" id="user-status" class="form-check-input" name="status" value="1" <?php echo isset($user['status']) && $user['status'] ? 'checked' : '' ?>/>
                <label class="form-check-label" for="user-status">Status</label>
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>"/>
            <button class="btn btn-primary mb-2">Submit</button>
        </div>

    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
