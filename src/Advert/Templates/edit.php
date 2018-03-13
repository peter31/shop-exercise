<?php include dirname(__DIR__, 2) . '/Common/Templates/header.php' ?>

<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
<form  action="/admin/adverts/edit_action" method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
    Title:<br>
    <input type="text" name="title" value="<?php echo $user['title'] ?>"required/><br><br>
    Message:<br>
    <textarea name="message" rows="10" cols="30" required><?php echo $user['message'] ?></textarea><br><br>
    Phone number:<br>
    <input type="text" name="phone" placeholder="078123456" value="<?php echo $user['phone'] ?>" required/><br><br>
    Status:<br>
    <input type="hidden" name="status" value="0"/>
    <input type="checkbox" name="status" value="1" <?php if ($user['status'] == 1) { ?>checked<?php } ?>/><br><br>
    <button>Submit</button>
</form>

<?php include dirname(__DIR__, 2) . '/Common/Templates/footer.php' ?>