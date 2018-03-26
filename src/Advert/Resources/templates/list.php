<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/header.php' ?>

    <table>
        <tr>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($adverts as $advert) { ?>
            <tr>
                <td><a href="/adverts/item?id=<?php echo $advert['id'] ?>"><?php echo $advert['title'] ?></a></td>
                <td><?php echo $advert['created'] ?></td>

            </tr>
        <?php } ?>
    </table>

<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/footer.php' ?>