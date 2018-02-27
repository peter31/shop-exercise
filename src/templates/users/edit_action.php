<?php include dirname(__DIR__) . '/header.php' ?>
<form action='/admin/users/edit_action' method='POST'>
    <input  style='display: block' type='text' name='user' placeholder='user' value='<?php echo $name ?>' required/>
    <input style='display: block' type='email' name='email' placeholder='example@mail.com' value='<?php echo $email ?>' required/>
    <input type="hidden" value="<?php $id ?>" name="id">
    <button>Change</button>
</form>
<?php include dirname(__DIR__) . '/footer.php' ?>