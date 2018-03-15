<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/header.php' ?>
<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
    <p><b><?php echo $userResultString ?></b></p>
    <p><a href="/admin/adverts/add">Add another one advert</a></p>
    <p><a href="/admin/adverts">Return to the list of adverts</a></p>

<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/footer.php' ?>