<?php include dirname(__DIR__) . '/header.php' ?>
    <form enctype='multipart/form-data' action='/admin/users/csv_action' method='POST'>
        <input name='file' type='file'/>
        <input type='submit' name='Check' value='Send'/>
    </form>
<?php include dirname(__DIR__) . '/footer.php' ?>