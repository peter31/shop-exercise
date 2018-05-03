<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form  action="/admin/adverts/edit_action" method="POST">

        <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <input type="hidden" name="id" value="<?php echo $advert['id'] ?>" />

        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $advert['title'] ?>"required/>
        </div>

        <div class="form-group">
            <label>Message:</label>
            <textarea name="message" rows="10" cols="30" required><?php echo $advert['message'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Phone number:</label>
            <input type="text" name="phone" placeholder="078123456" value="<?php echo $advert['phone'] ?>" required/>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="status" value="0"/>
                <input type="checkbox" name="status" value="1" <?php echo isset($advert['status']) && $advert['status'] ? 'checked' : '' ?>/>
                <label class="form-check-label" for="advert-status">Status</label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary mb-2">Submit</button>
        </div>

    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>