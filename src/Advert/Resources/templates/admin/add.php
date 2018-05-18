<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form  action="/admin/adverts/add_action" method="POST">

        <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <div class="form-group">
           <label>Title:</label>
            <input name="title" class="form-control" value="<?php echo $item['title'] ?? '' ?>" required/>
        </div>

        <div class="form-group">
            <label>Message:</label>
            <textarea name="message" class="form-control" rows="10" cols="30" value="<?php echo $item['message'] ?? '' ?>" required></textarea>
        </div>

        <div class="form-group">
            <label>Phone number:</label>
            <input name="phone" class="form-control" placeholder="078123456" value="<?php echo $item['phone'] ?? '' ?>" placeholder="078123456" required/>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="status" value="0"/>
                <input type="checkbox" id="advert-status" class="form-check-input" name="status" value="1" <?php echo isset($item['status']) && !$item['status'] ? '' : 'checked' ?>/>

                <label class="form-check-label" for="advert-status">Status</label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary mb-2">Submit</button>
        </div>

    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
