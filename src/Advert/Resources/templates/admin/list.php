<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
    <div class="content">
        <a href="/admin/adverts/add"><b>Add an advert through form</b></a>
        <p></p>
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>*</th>
                <th>*</th>
            </tr>
    <?php foreach ($adverts as $advert) { ?>
            <tr align="center">
                <td><?php echo $advert['id'] ?></td>
                <td align="left"><?php echo $advert['title'] ?></td>
                <td><?php echo $advert['phone'] ?></td>
                <td><?php echo $advert['status'] ?></td>
                <td><?php echo $advert['created'] ?></td>
                <td><?php echo $advert['updated'] ?></td>
                <td><a href="/admin/adverts/edit?id=<?php echo $advert['id'] ?>">Edit</a></td>
                <td><a href="/admin/adverts/delete_action?id=<?php echo $advert['id'] ?>" onclick="return confirm('Delete selected element?');">Delete</a></td>
            </tr>
    <?php } ?>
        </table>
        </div>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>
