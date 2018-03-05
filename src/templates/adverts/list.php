<?php include dirname(__DIR__) . '/header.php' ?>
    <p><a href='/admin/adverts/add'>Add an advert through form</a></p>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Header</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($adverts as $advert) { ?>
            <tr>
                <td><?php echo $advert['id'] ?></td>
                <td><?php echo $advert['header'] ?></td>
                <td><?php echo $advert['phone'] ?></td>
                <td><?php echo $advert['status'] ?></td>
                <td><?php echo $advert['created'] ?></td>
                <td><?php echo $advert['updated'] ?></td>
                <td><a href="/admin/adverts/edit?id=<?php echo $user['id'] ?>">Edit</a></td>
                <td><a href="/admin/adverts/delete_action?id=<?php echo $user['id'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
<?php include dirname(__DIR__) . '/footer.php' ?>