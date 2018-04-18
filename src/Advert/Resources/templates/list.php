<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/header.php' ?>
    <div class="content">
        <table width="100%">
        <?php foreach ($adverts as $advert) { ?>
            <tr>
                <td class="title"><a href="/advert/item?id=<?php echo $advert['id'] ?>"><?php echo $advert['title'] ?></a></td>
                <td class="created"><?php echo $advert['created'] ?></td></tr>
        <?php } ?>
        </table>
    </div>
<?php include dirname(__DIR__, 3) . '/Common/Resources/templates/footer.php' ?>