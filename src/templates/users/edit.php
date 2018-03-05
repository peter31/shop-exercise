<?php include dirname(__DIR__) . '/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
<form action='/admin/users/edit_action' method='POST'>
    <input type='hidden' name='id' value='<?php echo $id ?>' />
    Name:<br>
    <input type='text' name='user' placeholder='user' value='<?php echo $user ?>' required/><br><br>
    Email:<br>
    <input type='email' name='email' placeholder='example@mail.com' value='<?php echo $email ?>' required/><br><br>
    Password:<br>
    <input type='password' name='password' placeholder='user' value='<?php echo $password ?>' required/><br><br>
    Status:<br>
    <input type="hidden" name="status" value="0">
    <?php
    if ($status == 1) { ?>
        <input type="checkbox" name="status" value="<?php echo $status ?>" checked><br><br>
    <?php } else { ?>
        <input type="checkbox" name="status" value="1"><br><br>
    <?php } ?>
    <button>Submit</button>
</form>
<?php include dirname(__DIR__) . '/footer.php' ?>