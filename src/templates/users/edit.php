<?php include dirname(__DIR__) . '/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
<form action='/admin/users/edit_action' method='POST'>
    Name:<br>
    <input type='text' name='user' placeholder='user' value='<?php echo $user ?>' required/><br><br>
    Email:<br>
    <input type='email' name='email' placeholder='example@mail.com' value='<?php echo $email ?>' required/><br><br>
    Password:<br>
    <input type='text' name='password' placeholder='user' value='<?php echo $password ?>' required/><br><br>
    Status:<br>
    <input type='text' name='status' value='<?php echo $status ?>' required/><br><br>
    List:<br>
    <input type='text' name='list' value='<?php echo $list ?>' required/><br><br>
    Add form:<br>
    <input type='text' name='aform' value='<?php echo $aform ?>' required/><br><br>
    Edit form:<br>
    <input type='text' name='eform' value='<?php echo $eform ?>' required/><br><br>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <button>Submit</button>
</form>
<?php include dirname(__DIR__) . '/footer.php' ?>