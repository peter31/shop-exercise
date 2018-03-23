<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/header.php' ?>

    <div>
        <ul>
            <?php foreach ($adverts as $advert) {?>
                <li>
                    <a href="/adverts/item?id=<?php echo $advert['id'] ?>"><?php echo $advert['title'] ?></a>
                </li>
                <?php } ?>
        </ul>
    </div>
<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/footer.php' ?>
