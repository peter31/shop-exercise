<?php

include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
    <form enctype="multipart/form-data" action="/admin/users/csv_action" method="POST">
        <input type="file" name="browse_csv"/>
        <input type="submit" name="send_csv" value="Send"/>
    </form>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>