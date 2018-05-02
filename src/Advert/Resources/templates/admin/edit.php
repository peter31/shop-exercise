<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
    <div class="content">
        <form  action="/admin/adverts/edit_action" method="POST">
            <p><?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?></p>
            <input type="hidden" name="id" value="<?php echo $advert['id'] ?>" />
            <p>Title:</p>
            <input type="text" name="title" value="<?php echo $advert['title'] ?>"required/>
            <p>Message:</p>
            <textarea name="message" rows="10" cols="30" required><?php echo $advert['message'] ?></textarea>
            <p>Phone number:</p>
            <input type="text" name="phone" placeholder="078123456" value="<?php echo $advert['phone'] ?>" required/>
            <p>Status:</p>
            <input type="hidden" name="status" value="0"/>
            <input type="checkbox" name="status" value="1" <?php echo isset($advert['status']) && $advert['status'] ? 'checked' : '' ?>/>
            <button>Submit</button>
        </form>
    </div>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>