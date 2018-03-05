<?php include dirname(__DIR__) . '/header.php' ?>
    <form  action='/add_adverts_action' method='POST'>
        Title:<br>
        <input type='text' name='title' required/><br><br>
        Text:<br>
        <textarea name='message' rows='10' cols='30' required></textarea><br><br>
        Phone number:<br>
        +373 <input type='text' name='phone' placeholder='XXXXXXXX' required><br><br>
        <input type='checkbox' name='yes' value='?'>
        <button>Submit</button>
    </form>
<?php include dirname(__DIR__) . '/footer.php' ?>