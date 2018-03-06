<?php include dirname(__DIR__) . '/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
    <form  action="/admin/adverts/add_action" method="POST">
        Title:<br>
        <input type="text" name="title" required/><br><br>
        Text:<br>
        <textarea name="message" rows="10" cols="30" required></textarea><br><br>
        Phone number:<br>
        <input type="text" name="phone" placeholder="078123456" required/><br><br>
        Status:<br>
        <input type="hidden" name="checkbox" value="0"/>
        <input type="checkbox" name="checkbox" value="1" checked/><br><br>
        <button>Submit</button>
    </form>
<?php include dirname(__DIR__) . '/footer.php' ?>