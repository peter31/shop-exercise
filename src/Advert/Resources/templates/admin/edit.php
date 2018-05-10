<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form action="/admin/adverts/edit_action" method="POST">

        <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <div class="form-group">
            <label>Title:</label>
            <input name="title" class="form-control" value="<?php echo $item['title'] ?>"required/>
        </div>

        <div class="form-group">
            <label>Message:</label>
            <textarea name="message" class="form-control" rows="10" cols="30" required><?php echo $item['message'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Phone number:</label>
            <input name="phone" class="form-control" placeholder="078123456" value="<?php echo $item['phone'] ?>" required/>
        </div>

        <div class="form-group">
            <input type="hidden" name="status" value="0"/>

            <label class="form-check-label" for="advert-status">Status</label>
            <input type="checkbox" id="advert-status" name="status" value="1" <?php echo isset($item['status']) && $item['status'] ? 'checked' : '' ?>/>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>

            <button class="btn btn-primary mb-2">Submit</button>
        </div>

    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
