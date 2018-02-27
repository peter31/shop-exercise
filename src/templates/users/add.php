<?php include dirname(__DIR__) . '/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
    <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
  <br />
<?php } ?>
<form  action='/admin/users/add_action' method='POST'>
<input  style='display: block' type='text' name='user' placeholder='user' required/>
<input style='display: block' type='email' name='email' placeholder='example@mail.com' required/>
<button>Add</button>
</form>
<?php include dirname(__DIR__) . "/footer.php" ?>