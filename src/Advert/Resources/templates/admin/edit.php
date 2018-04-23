<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
<div class="content">
<?php if (!empty($errors)) {
foreach($errors as $error) { ?>
<span style="color: #C1272D"><?php echo $error ?></span>
<?php }
} ?>
<form  action="/admin/adverts/edit_action" method="POST">
<input type="hidden" name="id" value="<?php echo $advert['id'] ?>" />
Title:<br>
<input type="text" name="title" value="<?php echo $advert['title'] ?>"required/><br><br>
Message:<br>
<textarea name="message" rows="10" cols="30" required><?php echo $advert['message'] ?></textarea><br><br>
Phone number:<br>
<input type="text" name="phone" placeholder="078123456" value="<?php echo $advert['phone'] ?>" required/><br><br>
Status:<br>
<input type="hidden" name="status" value="0"/>
<input type="checkbox" name="status" value="1" <?php if ($advert['status'] == 1) { ?>checked<?php } ?>/><br><br>
<button>Submit</button>
</form>
</div>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>