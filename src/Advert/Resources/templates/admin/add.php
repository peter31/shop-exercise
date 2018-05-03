<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>

    <form  action="/admin/adverts/add_action" method="POST">

        <?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?>

        <div class="form-group">
            <label>Title:</label>
            <input name="title" class="form-control" value="<?php echo $item['title'] ?? '' ?>" required/>
        </div>

        <div class="form-group">
          <label>Text:</label>
          <textarea name="message" class="form-control" rows="10" cols="30" value="<?php echo $item['message'] ?? '' ?>" required></textarea>
        </div>

        <div class="form-group">
          <label>Phone number:</label>
          <input type="text" name="phone" class="form-control" value="<?php echo $item['phone'] ?? '' ?>" placeholder="078123456" required/>
        </div>

        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="advert-status" name="checkbox" value="1" checked/>
            <input type="hidden" name="checkbox" value="0"/>

            <label class="form-check-label" for="advert-status">Status</label>
          </div>
        </div>

        <div class="form-group">
          <button class="btn btn-primary mb-2">Submit</button>
        </div>
    </form>

<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
