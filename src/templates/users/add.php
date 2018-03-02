<?php include dirname(__DIR__) . '/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
    <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
  <br />
<?php } ?>
<form  action='/admin/users/add_action' method='POST'>
    User:<br>
    <input type='text' name='user' placeholder='user' required/><br><br>
    Email:<br>
    <input type='email' name='email' placeholder='example@mail.com' required/><br><br>
    Password:<br>
    <input type='password' name='password' placeholder='password' required/><br><br>
    <button>Submit</button>
</form>
<?php include dirname(__DIR__) . "/footer.php" ?>