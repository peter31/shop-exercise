<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
    <form  action="/admin/adverts/add_action" method="POST">
        <p><?php include dirname(__DIR__, 4) . '/Common/Resources/templates/errors.php' ?></p>
        <p>Title:</p>
        <input type="text" name="title" value="<?php echo $advert['title'] ?? '' ?>" required/>
        <p>Text:</p>
        <textarea name="message" rows="10" cols="30" value="<?php echo $advert['message'] ?? '' ?>" required></textarea>
        <p>Phone number:</p>
        <input type="text" name="phone" value="<?php echo $advert['phone'] ?? '' ?>" placeholder="078123456" required/>
        <p>Status:</p>
        <input type="hidden" name="checkbox" value="0"/>
        <input type="checkbox" name="checkbox" value="1" checked/>
        <button>Submit</button>
    </form>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>